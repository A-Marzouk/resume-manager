<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 6:39 PM
 */

namespace App\Http\Controllers;


use App\Campaign;
use App\CampaignFile;
use App\classes\Upload;
use App\Client;
use App\User;
use App\UserData;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Description;

class CampaignsController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:client');
    }

    public function viewCampaigns()
    {
        return view('admin.campaigns');
    }


    public function viewSingleCampaign($campID)
    {
        $campaign = Campaign::where('id', $campID)->first();
        $members = $campaign->members;
        $campaignClient = $campaign->client;
        $currentUser = auth()->user();
        $currentClient = auth()->guard('client')->user();

        if (!$currentUser && !$currentClient) {
            return redirect('/')->with('errorMessage', 'You need to log in first to view campaign.');
        }

        if ($currentClient) {
            if ($campaignClient->id == $currentClient->id) {
                return view('campaigns.single_campaign', compact('campaign'));
            }
        }

        $isCampaignUser = false;
        if ($currentUser) {
            if ($currentUser->admin == true) {
                return view('campaigns.single_campaign', compact('campaign'));
            }

            foreach ($members as $campaignMember) {
                if ($currentUser->id == $campaignMember->id) {
                    $isCampaignUser = true;
                    break;
                }
            }
        }
        if (!$isCampaignUser && $currentUser->admin != true) {
            return redirect('/')->with('errorMessage', 'Only campaign members can view this page.');
        }

        return view('campaigns.single_campaign', compact('campaign'));

    }

    public function getAllClients()
    {
        return Client::all();
    }

    public function getBusinessSupportUsers()
    {
        $members = User::where([
            'profession' => 'businessSupport',
            'status' => 'LIGHTGREEN'
        ])->get();
        foreach ($members as &$member) {
            if (isset($member->userData)) {
                $member['image'] = $member->userData->photo;
            } else {
                $member['image'] = '';
            }
        }
        return $members;
    }

    public function getAllCamps()
    {
        $campaigns = Campaign::all();
        foreach ($campaigns as &$campaign) {
            $campaign['client'] = Client::where('id', $campaign->client_id)->first();
            $members = $campaign->members;
            foreach ($members as &$member) {
                $member['image'] = $member->userData->photo;
            }
            $campaign['members'] = $members;
            $campaign['shifts'] = $campaign->shifts;
        }
        return $campaigns;
    }

    public function getClientCamps()
    {
        $campaigns = currentClient()->campaigns; // retreive it to be sent with current client data
        return currentClient();
    }

    public function addCamp(Request $request)
    {
        $currClient = Client::where('id', $request->client_id)->first();
        $request->validate([
            'title' => 'max:190|required',
            'description' => 'max:1500|required',
            'status' => 'max:190',
            'start_date' => 'max:190|required',
            'end_date' => 'max:190|required',
        ]);

        if (isset($request->id)) {
            // edit
            $campaign = Campaign::where('id', $request->id)->first();
        } else {
            // add
            $campaign = new Campaign;
            $campaign->client_id = $currClient->id;
        }

        $campaign->title = $request->title;
        $campaign->description = $request->description;
        $campaign->status = $request->status;
        $campaign->start_date = $request->start_date;
        $campaign->end_date = $request->end_date;

        $campaign->save();

        return ['id' => $campaign->id];

    }

    public function deleteCamp(Request $request)
    {
        // delete $campaign
        $campaign = Campaign::where('id', $request->campID);
        $campaign->delete();
        return 'Campaign has been deleted';
    }

    public function getCampMembers(Request $request)
    {
        $campID = $request->campID;
        return Campaign::find($campID)->members;
    }


    public function getClientCampMembers($camp_id)
    {
        $campaign = Campaign::where('id',$camp_id)->with('agents.user','agents.user.userData','agents.logs')->first();
        return $campaign->agents ;
    }

    public function saveCampaignProcessFLow(Request $request){

        $campaign = Campaign::where('id',$request->campaign_id)->first();
        $campaign->update([
            'process_flow' => $request->process_flow
        ]);
        return $campaign ;
    }

    public function addMembersToCamp(Request $request)
    {
        $campaign = Campaign::find($request->campID);
        if (empty($request->users)) {
            // remove all freelancers from the campaign.
            foreach ($campaign->members as $member) {
                $campaign->members()->detach($member->id);
            }
        } else {
            foreach ($request->users as $user) {
                // sync with the id's sent.
                $IDs[] = $user['id'];
            }
            $campaign->members()->sync($IDs);
        }
        return 'Members Updated';
    }


    public function updateCampaignStatus(Request $request)
    {
        $campaign = Campaign::where('id',$request->campaign_id)->first();
        switch ($request->campaignStatus) {
            case 'ACTIVE':
                $campaign->update([
                    'status' => 1
                ]);
                break;

            case 'PAUSED':
                $campaign->update([
                    'status' => 2
                ]);
                break;

            case 'CANCELLED':
                $campaign->update([
                    'status' => 3
                ]);
                break;
            default:
                break;
        }

        return $campaign ;
    }

    public function updateCampaignInfo(Request $request){
        $campaign = Campaign::where('id',$request->campaign_id)->first();

        $request->validate([
            'title' => 'max:190|min:7|required',
            'description' => 'max:1500|min:7|required',
        ]);

        $campaign->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return [
            'status' => 'success'
        ];
    }

    public function uploadFilesToCampaign(Request $request){
        $campaign_id = $request->campaign_id ;
        $file = Upload::campaignFile('campaignFile',date(time()));
        // create a media record for the uploaded campaign file :
        if(isset($file['path'])){
            // create new media record
            $file = CampaignFile::create([
                'name' => basename($_FILES['campaignFile']["name"]),
                'path' => $file['path'],
                'file_name' => $file['path'],
                'mime_type' => $file['format'],
                'campaign_id' => $campaign_id,
                'category' => 'files'
            ]);

            return [
                'file' => $file,
            ];

        }

        return[
          'filePath' => null
        ];

    }

    public function deleteFileCampaign(Request $request){
        // remove the file from the directory
        $file = CampaignFile::where('id',$request->file_id)->first();

        if (file_exists($file->path)) {
            unlink($file->path);

            // delete the file record from the database
            $file->delete();
        }

        return [
            'status' => 'success'
        ];
    }

}