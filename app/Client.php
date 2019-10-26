<?php

namespace App;

use App\Models\Concerns\HasUser;
use App\Notifications\ClientResetPasswordNotification;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasUser;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guard = 'client';

    protected $fillable = [
        'agency','agency_phone', 'department_email', 'website', 'skype_id', 'signature', 'second_contact', 'second_contact_phone', 'preferred_contact', 'contact','signature'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ClientResetPasswordNotification($token));
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function search()
    {
        return $this->hasMany(Search::class);
    }

    public function affiliate()
    {
        return $this->belongsTo(Affiliate::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function conversations()
    {
        return $this->hasMany(Conversation::class)->orderBy('updated_at', 'desc');
    }

    public function campaignBriefs()
    {
        return $this->hasMany(CampaignBrief::class);
    }

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function searches()
    {
        return $this->hasMany(SearchResult::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function unreadMessages()
    {
        $conversations = $this->conversations;
        $countUnread = 0;
        foreach ($conversations as $conversation) {
            $countUnread += $conversation->unread_messages_client;
        }

        return $countUnread;
    }

}
