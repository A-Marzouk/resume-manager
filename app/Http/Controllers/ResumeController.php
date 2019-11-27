<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Agent;
use App\User;

class ResumeController extends Controller
{
    public function downloadPDFResume($username) {
        // $user_data = $request->user_data;
        // $agent = $request->freelancer;
        // $skills = $request->skills;
        // $workHistory = $request->workHistory;
        // $educationHistory = $request->educationHistory;

        $dateAux = new \DateTime();

        // test
        $skills = [
            array(
                "type" => 'programming',
                "id" => 1,
                "skill_title" => 'javascript'
            ),
            array (
                "type" => 'software',
                "id" => 2,
                "skill_title" => 'Linux'
            ),
            array (
                "type" => 'programming',
                "id" => 3,
                "skill_title" => 'PHP'
            ),
            array (
                "type" => 'design',
                "id" => 4,
                "skill_title" => 'Inkscape'
            ),
            array (
                "type" => 'framework',
                "id" => 5,
                "skill_title" => 'React.js'
            ),
            array (
                "type" => 'framework',
                "id" => 6,
                "skill_title" => 'Node.js'
            ),
            array (
                "type" => 'framework',
                "id" => 7,
                "skill_title" => 'laravel'
            ),
            array (
                "type" => 'framework',
                "id" => 8,
                "skill_title" => 'Codeigniter'
            ),
            array (
                "type" => 'programming',
                "id" => 9,
                "skill_title" => 'C++'
            ),
            array (
                "type" => 'programming',
                "id" => 10,
                "skill_title" => 'C#'
            ),
            array (
                "type" => 'programming',
                "id" => 11,
                "skill_title" => 'Visual Basic'
            ),
            array (
                "type" => 'programming',
                "id" => 12,
                "skill_title" => 'Python'
            ),
            array (
                "type" => 'database',
                "id" => 13,
                "skill_title" => 'MySQL'
            ),
            array (
                "type" => 'database',
                "id" => 14,
                "skill_title" => 'MongoDB'
            ),
            array (
                "type" => 'framework',
                "id" => 15,
                "skill_title" => 'Vue.js'
            ),
            array (
                "type" => 'design',
                "id" => 16,
                "skill_title" => 'GIMP'
            ),
            array (
                "type" => 'design',
                "id" => 16,
                "skill_title" => 'Gravit designer'
            )
        ];

        $agent = array(
            "id" => 1,
            "firstName" => "Jose Daniel",
            "lastName" => "Quintero",
            "projects" => array()
        );

        $worksHistory = [
            array(
                "job_title" => 'Fullstack developer',
                "company" => '123workforce',
                "date_from" => $dateAux->setTimestamp(1390278600000 / 1000),
                "currently_working" => true,
                "date_end" => null,
                "job_description" => "Officia adipisicing incididunt consectetur aliquip et pariatur nisi laboris. Dolor non esse fugiat excepteur minim occaecat eu. Do ex ut ea et officia. Ut exercitation laborum officia cupidatat nulla eu. Ex laborum minim nostrud nostrud nostrud qui irure ea voluptate cillum dolore mollit ea magna.

                Dolor ad irure cupidatat ea dolore eiusmod ex ad ex duis ex consequat ullamco. Et do amet nulla culpa elit ad. Exercitation commodo sunt anim do reprehenderit commodo nostrud qui reprehenderit pariatur ea voluptate laboris. Magna eiusmod nulla minim eiusmod do. Ullamco pariatur commodo quis enim duis cupidatat ut nisi. Do irure incididunt non eu Lorem sint ullamco proident ea eu. Ipsum nisi tempor officia velit reprehenderit ut tempor.

                Tempor in pariatur veniam dolore. Qui ex ut magna quis adipisicing fugiat amet. Labore veniam et eiusmod cillum exercitation laborum. Dolore laborum tempor nulla incididunt et sint amet ut irure incididunt labore amet et elit. Magna voluptate velit ex irure esse sunt adipisicing est laborum pariatur consectetur exercitation nulla. Nulla incididunt id velit in qui commodo commodo exercitation magna ipsum. Tempor velit culpa dolore incididunt ex id labore quis ipsum eiusmod nisi esse amet.

                Laboris veniam proident fugiat dolore qui. Dolore nisi id dolor id et qui eu culpa pariatur sint. Velit sit ea nisi esse excepteur nulla ea culpa sint aute duis. Occaecat fugiat do dolor Lorem occaecat culpa ex minim ut Lorem irure labore est ad. Sit proident cillum amet ut eiusmod dolore. Deserunt laboris do qui mollit ut excepteur irure esse quis est."
            )
        ];

        $educationHistory = [
            array(
                "school_title" => '"Simón Bolívar" University',
                "date_from" => $dateAux->setTimestamp(1409545800000 / 1000),
                "currently_learning" => true,
                "date_end" => null,
                "description" => "
                    Ipsum dolore adipisicing aliquip duis. Aute sint incididunt ullamco cillum sunt excepteur dolor magna aliquip ullamco mollit enim occaecat. Id labore amet dolor Lorem adipisicing aute fugiat ipsum sint. Consequat cillum excepteur ipsum elit. Nostrud irure quis pariatur ex sit id dolor quis. Sunt fugiat anim amet incididunt officia cillum quis. Incididunt aliqua mollit sint sit esse ad incididunt Lorem.

                    Est deserunt elit esse laborum. Consequat do reprehenderit amet nulla incididunt velit irure nostrud consequat. Irure consequat incididunt aliqua esse incididunt. Tempor irure proident Lorem nisi tempor elit fugiat nostrud sint cupidatat irure reprehenderit. Ex in nisi elit velit. Dolore ullamco esse officia exercitation ut occaecat sit ipsum. Id nisi occaecat est consectetur eiusmod ex reprehenderit occaecat.

                    Tempor pariatur consequat anim aliquip elit culpa esse in dolor amet qui est labore. Amet enim laborum enim adipisicing voluptate sint occaecat eu excepteur. Incididunt tempor sunt ipsum consequat Lorem fugiat cupidatat Lorem ipsum ex ut exercitation cillum.
                "
            )
        ];

        $user_data = [
            "salary_monthly" => 1700,
            "availableHours" => '40',
            "photo" => '/images/home/profile1.png',
            "job_title" => 'Software developer',
            "salary" => 10
        ];

        $agentData = $this->getAgentData($username);
        // dd($agentData);

        if ($agentData) {

            $view = \View::make('freelancer.resume_pdf', [
                'agent' => $agentData['agent'],
                'user_data' => $agentData['user_data'],
                'skills' => $agentData['skills'],
                'worksHistory' => $agentData['worksHistory'],
                'educationHistory' => $agentData['educationsHistory']
            ])->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);
            return $pdf->download('resume.pdf');
        }
    }

    public function getAgentData ($username) {

        $user = User::where('username', $username)->get();
        $agent = Agent::where('user_id', $user[0]->id)->get();
        
        if (!empty($agent)) {
            // The user is an agent

            // Educations history
            $educationsHistory = $user[0]->educationsHistory;
            $user_data = $user[0]->userData;
            $worksHistory = $user[0]->worksHistory;
            $skills = $user[0]->skills;

            // dd($user_data);

            return array(
                "username" => $username,
                "agent" => $agent[0],
                "user" => $user[0],
                "user_data" => $user_data,
                "skills" => $skills,
                "worksHistory" => $worksHistory,
                "educationsHistory" => $educationsHistory
            );
        }

        return false;
    }

    public function agentsResume($username) {

        $freelancer = User::where('username',$username)->with(['userData','skills','agent','worksHistory.projects','references','educationsHistory','projects'=>function($query) {
            return $query->limit(10);
        }])->where('username',$username)->first();
        return view('freelancer.resume_test', compact('freelancer'));
        
    }
}
