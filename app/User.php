<?php

namespace App;

use App\Media;
use App\Models\Concerns\HasData;
use App\Models\Concerns\HasPhoto;
use App\Models\Enums\UserStage;
use App\Models\Enums\UserStatus;
use EndyJasmi\Cuid;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use ReflectionClass;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media as BaseMedia;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasMedia
{
    public $emptyFields;

    use HasData, HasRoles, Notifiable, HasMediaTrait, HasPhoto;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'username',
        'referral_code',
        'status',
        'reviewed_at',
        'stage',
        'timezone',
        'agreed_with_service_agreement_at',
        'agreed_with_privacy_agreement_at',
    ];

    /**
     * The model's attributes.
     *
     * @var array
     */
    protected $attributes = [
        'status' => UserStatus::NEW_APPLICANT,
        'stage' => UserStage::PENDING,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->referral_code = Cuid::make();
        });
    }

    public function registerMediaConversions(BaseMedia $media = null)
    {
        $this->addMediaConversion('thumb')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->optimize()
            ->nonQueued()
            ->performOnCollections('photo');
    }

    /**
     * Get the resource's photo.
     *
     * @param  string  $value
     * @return \Illuminate\Http\Response
     */
    public function defaultResourcePhoto()
    {
        return app(Media::class)->defaultUserPhoto();
    }

    /**
     * Hash any password being inserted by default.
     *
     * @param  string  $password
     *
     * @return \App\User
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);

        return $this;
    }

    public function deactivate()
    {
        return tap($this, function ($user) {
            $user->is_active = false;
            $user->save();
        });
    }

    public function activate()
    {
        return tap($this, function ($user) {
            $user->is_active = true;
            $user->save();
        });
    }

    public function client()
    {
        return $this->hasOne(Client::class);
    }

    public function agent()
    {
        return $this->hasOne(Agent::class);
    }

    /**
     * Create a new agent.
     *
     * @param  array  $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function createAgent(array $attributes = [])
    {
        return $this->createRelated(Agent::class, $attributes);
    }

    /**
     * Create a new client.
     *
     * @param  array  $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function createClient(array $attributes = [])
    {
        return $this->createRelated(Client::class, $attributes);
    }

    /**
     * Create a new related.
     *
     * @param  string  $class
     * @param  array  $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function createRelated($class, array $attributes = [])
    {
        DB::beginTransaction();

        try {
            $classArrayKey = camel_case((new ReflectionClass($class))->getShortName());
            $modelData = array_key_exists($classArrayKey, $attributes) ? $attributes[$classArrayKey] : [];

            if (is_array($attributes['user'])) {
                $user = static::fill($attributes['user']);
                $user->save();
                $user->userData()->create(isset($attributes['user_data']) ? $attributes['user_data'] : []);

                $related = $user->assignRole($classArrayKey)->{$classArrayKey}()->save(new $class($modelData));
            } else {
                $related = static::find($attributes['user'])->assignRole($classArrayKey)->{$classArrayKey}()->save(new $class($modelData));
            }
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();

        return $related;
    }

    public function getIsAdminAttribute()
    {
        return $this->hasRole('admin');
    }

    public function getIsClientAttribute()
    {
        return $this->hasRole('client');
    }

    public function getIsAgentAttribute()
    {
        return $this->hasRole('agent');
    }

    public function jobs()
    {
        return $this->belongsToMany(Job::class);
    }

    public function days()
    {
        return $this->belongsToMany(ShiftDay::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }


    public function shifts()
    {
        return $this->belongsToMany(Shift::class);
    }

    public function hasApplied($jobID)
    {
        $job = Job::find($jobID);
        $freelancersApplied = $job->freelancersApplied()->get(['user_id']);
        $hasApplied = false;
        foreach ($freelancersApplied as $freelancer) {
            if ($freelancer->user_id == auth()->user()->id) {
                $hasApplied = true;
            }
        }
        return $hasApplied;
    }

    public function data()
    {
        return $this->hasOne(UserData::class);
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }

    public function userData()
    {
        return $this->hasOne(UserData::class);
    }

    public function worksHistory()
    {
        return $this->hasMany(WorkHistory::class);
    }

    public function invoices()
    {
        return $this->hasMany(User::class);
    }

    public function educationsHistory()
    {
        return $this->hasMany(EducationHistory::class);
    }

    public function owner()
    {
        return $this->belongsTo(Affiliate::class);
    }

    public function affiliate()
    {
        return $this->belongsTo(Affiliate::class);
    }

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function recordings()
    {
        return $this->hasMany(Recording::class);
    }

    public function references()
    {
        return $this->hasMany(Reference::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function conversations()
    {
        return $this->hasMany(Conversation::class)->orderBy('updated_at', 'desc');
    }

    public function isComplete()
    {
        $userData = $this->userData->attributes;
        $except = ['home_page_freelancer', 'online', 'approved', 'birth_date', 'trainings', 'education', 'nationality', 'terms', 'googleCalendar', 'workForceAgent', 'preferredTime', 'surname'
            , 'workDesc0', 'workDesc1', 'workDesc2', 'workDesc3', 'workDesc4', 'workDesc5', 'workDesc6', 'workDesc7', 'works', 'workExperience'];
        if ($this->profession == 'Developer') {
            array_push($except, 'dribbleLink', 'instagramLink');
        } elseif ($this->profession == 'Designer') {
            array_push($except, 'githubLink', 'stackoverflowLink');
        }
        $emptyFields = [];
        foreach ($userData as $key => $data) {
            if ($data == null || empty($data)) {
                if ($key == 'audio' || $key == 'audioFile') {
                    continue;
                }
                if (in_array($key, $except)) {
                    continue;
                }
                $emptyFields[] = $key;
            }
        }

        $this->emptyFields = $emptyFields;

        if (count($emptyFields) > 0) {
            return false;
        }
        return true;

    }

    public function unreadMessages()
    {
        $conversations = $this->conversations;
        $countUnread = 0;
        foreach ($conversations as $conversation) {
            $countUnread += $conversation->unread_messages_freelancer;
        }

        return $countUnread;
    }

    public function getCompletionPercent()
    {
        // field to check :
        // name, profession, audio, video,
    }
}
