<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/pdf" charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $freelancer->userData["first_name"].' '.$freelancer->userData["last_name"] }} Resume</title>
  <style>
  
    body,
    html {
      padding: 40px;
      padding-bottom: 20px;
      margin: 0;
      font-family: Roboto, Arial, Helvetica, sans-serif;
      position: relative;
    }
    .resume {
      width: 100%;
      background: rgba(16, 78, 251, 0.06);
    }

    .resume__header {
      color: #104EFB;
      padding: 20px;
      width: 100%;
    }

    .resume__header > * {
      display: inline-block;
    }

    .resume__header__userImg img {
      height: 100px;
      margin-top: 55px;
      border-radius: 50px;
      border: 5px solid #104EFB;
    }

    .resume__header__userInfo {
      margin-left: 20px;
      margin-top: 10px;
      max-width: 200px;
    }

    .resume__header__userInfo .social-link-icon {
      margin: 0 5px;
      display: inline-block;
    }

    .resume__header__userInfo .social-link-icon:last-child {
      margin: 0;
      display: inline-block;
    }

    .resume__header__userInfo .social-link-icon img {
      height: 20px;
    }

    .resume__header__invoiceData {
      background-color: transparent;
      padding: 0 0 0 15px;
      border-radius: 10px;
      border: 1px solid #104EFB;
      width: 300px;
      height: 60px;
      float: right;
      margin-top: 50px;
    }

    .resume__header__invoiceData table {
      width: 100%;
      height: 60px;
    }

    .resume__header__invoiceData td {
      text-align: center;
    }

    .resume__header__invoiceData .little {
      font-size: 11px;
      margin-top: 3px;
    }

    .resume__header__invoiceData .value {
      font-size: 18px;
      margin-top: 7px;
    }

    .resume__header__invoiceData .hireLink {
      width: 110px;
    }

    .resume__header__invoiceData .hireLink a {
      display: block;
      height: 37px;
      position: relative;
      top: -4px;
      transform: translateX(5px);
      line-height: 28px;
      background: #104EFB;
      border-radius: 10px;
      padding: 12px 0;
      text-decoration: none;
      color: white;
      margin: 0 auto;
    }

    .resume__header__invoiceData p {
      width: 100%;
      margin: 0;
      text-align: center;
    }


    /* Content */
    .resume__content {
      width: 100%;
      padding: 0;
      position: relative;
    }

    .resume__content__titleWrapper {
      text-align: center;
      background: #104EFB;
      color: white;
      position: relative;
      padding: 20px 0 0;
      margin-bottom: 10px;
    }
    .resume__content section {
      margin-bottom: 40px;
      width: 100%;
    }

    .resume__content__titleWrapper .title {
      margin-bottom: 5px;
      font-size: 20px;
    }

    .resume__content__titleWrapper .decorator {
      margin: 0 auto;
      height: 6px;
      background: white;
      width: 100px;
      transform: translateY(1px);
      border-radius: 5px 5px 0 0;
    }


    .resume__content__details {
      margin-top: 0;
      color: #104EFB;
      padding: 20px 20px 0;
      width: 720px;
      position: relative;
    }

    .row .resume__content__details__container {
      display: inline-block;
      width: 330px;
      padding: 0 20px 0 10px;
      box-sizing: border-box;
      vertical-align: top; /* here */
    }

    .resume__content__details .container {
      margin-bottom: 40px;
    }

    .resume__content__details__subtitle {
      color: #104EFB;
      margin-bottom: 15px;
      text-align: center;
      font-weight: bold;
    }

    .resume__content__details__skills {
      width: 100%;
    }

    .resume__content__details__skills td {
      padding: 10px 0;
      color: #104EFB;
    }

    .resume__content__details .skillName,
    .resume__content__details .skillBar {
      margin: 10px 0;
    }

    .resume__content__details .skillName {
      font-size: 12px;
    }

    .resume__content__details .skillIcon {
      height: 14px;
      margin-right: 5px;
    }

    .resume__content__details .skillBar {
      width: 100%;
      height: 3px;
      background: #f6f6f6;
      position: relative;
    }

    .resume__content__details .skillBar .percentage {
      background: #4367D3;
      height: 3px;
      display: inline-block;
      position: absolute;
      top: 0;
      left: 0;
    }

    .resume__content__details__companyName,
    .resume__content__details__schoolName,
    .resume__content__details__projectName {
      color: #104EFB;
      font-weight: bold;
    }

    .resume__content__details__workDate,
    .resume__content__details__educationDate {
      margin: 10px 0;
    }

    .resume__content__details__workDetails,
    .resume__content__details__educationDetails,
    .resume__content__details__projectDetails, {
    }

    .resume__content__details__workDetails i,
    .resume__content__details__educationDetails i,
    .resume__content__details__projectDetails i {
      opacity: 0.7;
    }

    .resume__content__details__workDetails .content,
    .resume__content__details__educationDetails .content,
    .resume__content__details__projectDetails .content {
      margin-top: 20px;
    }

    .resume__content__details__projectImage {
      width: 100%;
      display: block;
      margin: 10px 0 30px;
    }

    .resume__content__details__projectImage img {
      height: 300px;
      display: block;
    }

    .resume__content__details__projectLink {
      margin-top: 15px;
    }
  </style>
</head>
<body>

  <?
    $auxDateStart = new \DateTime();
    $auxDateEnd = new \DateTime();
  ?>

  <main class="resume">
    <header class="resume__header">
      <picture class="resume__header__userImg">
        @if($freelancer->userData['profile_picture'] != null)
          <img src="{{public_path().'/'.$freelancer->userData['profile_picture']}}" alt="">
        @endif
      </picture>
      <div class="resume__header__userInfo">
        <h2>{{ $freelancer->userData['first_name'].' '.$freelancer->userData["last_name"] }}</h2>
        <p>{{ $freelancer->userData["job_title"] }}</p>
        <div>
          @if ($freelancer->userData['whatsapp'])
            <a class="social-link-icon" target="_blank" href="{{'https://wa.me/58'.str_replace('-', '', $freelancer->userData['phone']).'?text=Hello!%20I%20saw%20your%20profile%20on%20123workforce.com'}}">
              <img src="{{public_path().'/images/resume_themes/theme10/whatsapp.png'}}" alt="Whatsapp Icon">
            </a>
          @endif
          @if ($freelancer->userData['behance'])
            <a class="social-link-icon" target="_blank" href="{{'https://behance.net/'.$freelancer->userData['behance']}}">
              <img src="{{public_path().'/images/resume_themes/theme10/behance.png'}}" alt="Behance Icon">
            </a>
          @endif
          @if ($freelancer->userData['instagram'])
            <a class="social-link-icon" target="_blank" href="{{'https://instagram.com/'.$freelancer->userData['instagram']}}">
              <img src="{{public_path().'/images/resume_themes/theme10/instagram.png'}}" alt="Instagram Icon">
            </a>
          @endif
          @if ($freelancer->userData['dribble'])
            <a class="social-link-icon" target="_blank" href="{{'https://dribbble.com/'.$freelancer->userData['dribble']}}">
              <img src="{{public_path().'/images/resume_themes/theme10/dribbble.png'}}" alt="Dribbble Icon">
            </a>
          @endif
          @if ($freelancer->userData['linkedin'])
            <a class="social-link-icon" target="_blank" href="{{'https://linkedin.com/in/'.$freelancer->userData['linkedin']}}">
              <img src="{{public_path().'/images/resume_themes/theme10/linkedin.png'}}" alt="Dribbble Icon">
            </a>
          @endif
          @if ($freelancer->userData['github'])
            <a class="social-link-icon" target="_blank" href="{{'https://github.com/'.$freelancer->userData['github']}}">
              <img src="{{public_path().'/images/resume_themes/theme10/github.png'}}" alt="Dribbble Icon">
            </a>
          @endif
        </div>
      </div>

      <div class="resume__header__invoiceData">
        <table>
          <tr class="resume__header__invoiceData__hourlyRate">
            <td class="value"><b>{{ number_format(floatval($freelancer->agent["hourly_rate"]), 2) }}</b></td>
            <td class="value"><b>{{ intval($freelancer->agent["available_hours_per_week"]) }} hours</b></td>
            <td class="hireLink"><a href="http://www.123workforce.com">Hire me</a></td>
          </tr>
          <tr class="resume__header__invoiceData__weeklyAvailability">
            <td class="little">hourly rate</td>
            <td class="little">week availability</td>
          </tr>
        </table>
      </div>
    </header>

    <div class="resume__content">

      @if (!empty($freelancer->skills))
        <section>
          <div class="resume__content__titleWrapper">
            <div class="title">Skills</div>
            <div class="decorator"></div>
          </div>

          <?
            $programmingSkills = $freelancer->skills->filter(function ($item_values) {
              return ($item_values['type'] == 'programming' ? true : false);
            });

            $frameworkOrDatabaseSkills = $freelancer->skills->filter(function ($item_values) {
              return ($item_values['type'] == 'frameworks' || $item_values['type'] == 'database' ? true : false);
            });

            $softwareSkills = $freelancer->skills->filter(function ($item_values) {
              return ($item_values['type'] == 'software' ? true : false);
            });
            
            $designSkills = $freelancer->skills->filter(function ($item_values) {
              return ($item_values['type'] == 'design' ? true : false);
            });
          ?>

          <div class="resume__content__details">
            @if(count($programmingSkills) > 0)
            <div class="container">
              <div class="resume__content__details__subtitle">Programming Languages</div>
              @php
                $i = 0;
              @endphp
              <table class="resume__content__details__skills">
                  @foreach ($programmingSkills as $skill)
                    @if ($i % 6 == 0)
                      <tr>
                    @endif

                    <td class="skillName">
                        {{ $skill['skill_title'] }}: <b>{{ $skill['percentage'] }}%</b>
                    </td>

                    @if ($i % 6 == 5)
                      </tr>
                    @endif

                    @php
                      $i++;    
                    @endphp
                  @endforeach
              </table>
              
            </div>
            @endif

            @if(count($frameworkOrDatabaseSkills) > 0)
            <div class="container">
              <div class="resume__content__details__subtitle">Frameworks / Databases</div>
              @php
                $i = 0;
              @endphp
              <table class="resume__content__details__skills">
                  @foreach ($frameworkOrDatabaseSkills as $skill)
                    @if ($i % 6 == 0)
                      <tr>
                    @endif

                    <td class="skillName">
                        {{ $skill['skill_title'] }}: <b>{{ $skill['percentage'] }}%</b>
                    </td>

                    @if ($i % 6 == 5)
                      </tr>
                    @endif

                    @php
                      $i++;    
                    @endphp
                  @endforeach
              </table>
              
            </div>
            @endif
            
            @if(count($softwareSkills) > 0)
            <div class="container">
              <div class="resume__content__details__subtitle">Software</div>
              @php
                $i = 0;
              @endphp
              <table class="resume__content__details__skills">
                  @foreach ($softwareSkills as $skill)
                    @if ($i % 6 == 0)
                      <tr>
                    @endif

                    <td class="skillName">
                        {{ $skill['skill_title'] }}: <b>{{ $skill['percentage'] }}%</b>
                    </td>

                    @if ($i % 6 == 5)
                      </tr>
                    @endif

                    @php
                      $i++;    
                    @endphp
                  @endforeach
              </table>
              
            </div>
            @endif
            
            @if(count($designSkills) > 0)
            <div class="container">
              <div class="resume__content__details__subtitle">Design Skills</div>
              @php
                $i = 0;
              @endphp
              <table class="resume__content__details__skills">
                  @foreach ($designSkills as $skill)
                    @if ($i % 6 == 0)
                      <tr>
                    @endif

                    <td class="skillName">
                        {{ $skill['skill_title'] }}: <b>{{ $skill['percentage'] }}%</b>
                    </td>

                    @if ($i % 6 == 5)
                      </tr>
                    @endif

                    @php
                      $i++;    
                    @endphp
                  @endforeach
              </table>
              
            </div>
            @endif
          </div>
        </section>
      @endif

      @if ($freelancer->worksHistory->count() > 0)
          
        <section>
          <div class="resume__content__titleWrapper">
            <div class="title">Work</div>
            <div class="decorator"></div>
          </div>

          <div class="resume__content__details">
            @php
              $i = 0;    
            @endphp
            @foreach ($freelancer->worksHistory as $work)
              @if ($i % 2 == 0)
                <div class="row">
              @endif
                <div class="resume__content__details__container">
                  <div class="resume__content__details__companyName">
                    {{ $work['company'] }}
                  </div>
                  <div class="resume__content__details__workDate">
                    <?
                      
                      $auxDateStart->createFromFormat('YYYY-mm-dd', $work['date_from']);
                      if (!$work['is_currently_working']) {
                        $auxDateEnd->createFromFormat('YYYY-mm-dd', $work['date_to']);
                      }
                    ?>                
                    {{ date_format($auxDateStart, 'F\' Y') }} - {{ ($work['is_currently_working']) ? 'Now' : date_format($auxDateEnd, 'F\' Y')  }}
                  </div>
                  <div class="resume__content__details__workDetails">
                    <i>{{ $work['job_title'] }}</i>
                    <div class="content">{{ $work['job_description'] }}</div>
                  </div>
                </div>

              @if ($i % 2 == 1 || $i == count($freelancer->worksHistory) - 1)
                </div>
              @endif
              @php
                $i++;
              @endphp
            @endforeach
          </div>
        </section>
      @endif

      @if ($freelancer->educationsHistory->count() > 0)
        <section>
          <div class="resume__content__titleWrapper">
            <div class="title">Education</div>
            <div class="decorator"></div>
          </div>

          <div class="resume__content__details">
            @php
              $i = 0;
            @endphp
            @foreach ($freelancer->educationsHistory as $education)
              @if ($i % 2 == 0)
                <div class="row">
              @endif
              <div class="resume__content__details__container">
                <div class="resume__content__details__schoolName">
                    {{ $education['school_title'] }}
                </div>
                <div class="resume__content__details__educationDate">
                  <?
                    $auxDateStart->createFromFormat('YYYY-mm-dd', $education['date_from']);
                    if (!$education['is_currently_learning']) {
                      $auxDateEnd->createFromFormat('YYYY-mm-dd', $education['date_from']);
                    }
                  ?>                   
                  {{ date_format($auxDateStart, 'F\' Y') }} - {{ ($education['is_currently_learning']) ? 'Now' : date_format($auxDateEnd, 'F\' Y')  }}
                </div>
                <div class="resume__content__details__educationDetails">
                  <div class="content">{{ $education['description'] }}</div>
                </div>
              </div>
              @if ($i % 2 == 1 || $i == count($freelancer->educationsHistory) - 1)
                </div>
              @endif
              @php
                $i++;
              @endphp
            @endforeach
          </div>
        </section>
      @endif

      @if ($freelancer->projects->count() > 0)
        <section>
          <div class="resume__content__titleWrapper">
            <div class="title">Projects</div>
            <div class="decorator"></div>
          </div>

          <div class="resume__content__details">
            @foreach ($freelancer->projects as $project)
              <div class="resume__content__details__container">
                <div class="resume__content__details__projectName">
                    {{ $project->projectName }}
                </div>
                <div class="resume__content__details__projectImage">
                  <img src="{{ public_path().'/'.$project->mainImage }}" alt="" />
                </div>
                <div class="resume__content__details__projectDetails">
                  {{ $project->projectDesc }}
                </div>
                <div class="resume__content__details__projectLink">See the project here: <a href="{{ $project->link }}">{{ $project->link }}</a></div>
              </div>
            @endforeach
          </div>
        </section>
      @endif
    </div>
  </main>

  
</body>
</html>