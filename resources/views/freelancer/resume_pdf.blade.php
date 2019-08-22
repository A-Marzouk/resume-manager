<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $agent->user->name }} Resume</title>
  <style>
  
    body,
    html {
      padding: 0;
      margin: 0;
      font-family: Roboto, Arial, Helvetica, sans-serif;
    }
    .resume {
      width: 100%;
    }

    .resume__header {
      background: #4E75E8;
      color: white;
      padding: 40px;
      width: 100%;
    }

    .resume__header > * {
      display: inline-block;
    }

    .resume__header__userImg img {
      border-radius: 50%;
      border: 2px solid #A4B7ED;
    }

    .resume__header__userInfo {
      margin-left: 20px;
    }

    .resume__header__invoiceData {
      background-color: #4367D3;
      padding: 0 50px;
      border-radius: 5px;
      width: 250px;
      height: 55px;
      margin-left: 145px;
    }

    .resume__header__invoiceData__hourlyRate,
    .resume__header__invoiceData__weekAvailability {
      float: left;
      width: 50%;
    }

    .resume__header__invoiceData__hourlyRate {
      margin-left: -20px;
    }

    .resume__header__invoiceData .little {
      font-size: 11px;
      margin-top: 3px;
    }

    .resume__header__invoiceData .value {
      font-size: 18px;
      margin-top: 7px;
    }

    .resume__header__invoiceData p {
      width: 100%;
      margin: 0;
      text-align: center;
    }


    /* Content */
    .resume__content {
      width: 100%;
      padding: 60px 20px;
    }

    .resume__content__titleWrapper {
      text-align: center;
      color: #4E75E8;
      position: relative;
    }

    .resume__content__titleWrapper .title {
      margin-bottom: 10px;
      font-size: 20px;
    }

    .resume__content__titleWrapper .decorator {
      margin: 0 auto;
      height: 5px;
      background: #4E75E8;
      width: 100px;
    }

  </style>
</head>
<body>

  <main class="resume">
    <header class="resume__header">
      <picture class="resume__header__userImg">
        <img src="/images/freelancers/conor-sales-agent.jpg" alt="">
      </picture>
      <div class="resume__header__userInfo">
        <h2>{{ $agent->user->name.' '.$agent->user->lastname }}</h2>
        <p>{{ $agent->user->userData->job_title }}</p>
      </div>

      <div class="resume__header__invoiceData">
        <div class="resume__header__invoiceData__hourlyRate">
          <p class="value"><b>{{ number_format(floatval($agent->hourly_rate), 2) }}</b></p>
          <p class="little">hourly rate</p>
        </div>
        <div class="resume__header__invoiceData__weeklyAvailability">
          <p class="value"><b>{{ intval($agent->available_hours_per_week) }} hours</b></p>
          <p class="little">week availability</p>
        </div>
      </div>

    </header>

    <div class="resume__content">
      <section>
        <div class="resume__content__titleWrapper">
          <div class="title">Skills</div>
          <div class="decorator"></div>
        </div>
      </section>
    </div>
  </main>

  
</body>
</html>