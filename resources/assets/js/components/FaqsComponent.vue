<template>
  <div class="faqs dashboard-box">
    <div class="account-info-heading dashboard-box-heading">
      <div class="left">
        <img src="/images/faq/faq_40px.png" alt="info icon">
        <span>
                        FAQ
                    </span>
      </div>
    </div>
    <div class="faqs-wrapper"
         style="max-width: 95%">
      <div class="faq-questions-list">
        <div v-for="(faq,index) in faqs"
             v-bind:key="index"
             class="question-container">
          <div class="faq-question">
            <div class="faq-numbering">
              <span>{{index+1}}</span>
            </div>
            <div class="faq-item"
                 style="flex: 1;">
              <div class="faq-item-question">
                {{faq.question}}
              </div>
              <div class="faq-item-answer"
                   v-show="faq.opened">
                <span class="pre-formatted">{{faq.answer}}</span>
              </div>
            </div>
            <div class="faq-edit">
              <img src="/images/faq/dropdown.png" :id="'toggleIcon_'+faq.id" alt="toggle icon" @click="toggleAnswer(faq.id)">
                        </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</template>
<script>
export default {
  data() {
    return {
      faqs: [{
          id: 1,
          opened: false,
          question: 'How do payments and invoicing work, How much do you charge ? Can i get discounts?',
          answer: 'Payment can be made via credit card - Visa / Mastercard/ American Express or via paypal. Subscription payments and invoices can be managed and viewed via the Payments tab in the clients dashboard (currently under construction)\n' +
            'Subscription Payments are weekly and required in advance.\n' +
            'Recurring subscription payment will be setup for any campaign that will run beyond 1 week.\n' +
            '- the minimum engagement is 10 hours per week , the minimum number of weeks is 1 week. There is no maximum number of agents - we can provide full sales teams to work full time or part time.\n' +
            'We offer 1 flat rate hourly price at weekly subscriptions from 10 hours to 40 hours per week / agent\n' +
            '\n' +
            'USD 11.00\n' +
            'GBP 8.50\n' +
            'Euro 10.00\n' +
            'CAD 15.00\n' +
            'NZD 16.50\n' +
            'AUD 15.50\n' +
            'SGD 15.00\n' +
            '\n' +
            'Any training hours are charged.\n' +
            '\n' +
            'Discounts ;\n' +
            'Startups and Charities access 10 percent discount\n' +
            '\n' +
            'Discounts are available for teams/ multiple agents\n' +
            'Weekly subscriptions of 100 + hours  (  5  % Discount)\n' +
            'Weekly subscriptions of 200 + hours  ( 10 % Discount)\n' +
            'Weekly subscriptions of 400 + hours  ( 20 % Discount)\n' +
            'Weekly subscriptions of 800 + hours  ( 30 % Discount)'
        },
        {
          id: 2,
          opened: false,
          question: 'Where are your agents based? what is their background? What is their accents?',
          answer: 'agents are either office based in Cebu / Manila or remote based in surrounding cities with home office setups. ' +
            ' With 123 Workforce you can easily access highly effective, top performing sales agents.' +
            ' Our agents are excellent communicators, highly driven and passionate about selling. They are professionals in their field with many years of sales experience. ' +
            'All agents have neutral attractive and engaging voices with slight american sounding accent.'
        },
        {
          id: 3,
          opened: false,
          question: 'How do i hire an agent and get started?',
          answer: 'Once you register as a client, you can view all available agents via the agent tab.(currently under construction) .   Alternatively we can recommend the best available agent, so all you need to do is select your payment subscription and we will assign you the best agent for your campaign.' +
            ' You would begin by training your agent or sales team about your business and campaign goals'
        },
        {
          id: 4,
          opened: false,
          question: 'Can you show me some examples of recordings ?',
          answer: 'Sure, once you register as a client , you can view all agents in the agents tab of your dashboard (currently under construction)  and be able to listen to previous recordings.'
        },
        {
          id: 5,
          opened: false,
          question: 'What Sectors do you have experience in working with?',
          answer: 'We work for a variety of business sectors to include ; Call Centres / Real Estate Investors / Saas Companies / Home improvement companies / Recruitment Agencies / Charities / Insurance / Financial Investing',
        },
        {
          id: 6,
          opened: false,
          question: 'What are all the services you provide?',
          answer: 'We provide Telesales / Telemarketing / Appointment Setting / Cold Calling  / Lead Verification / B2B Sales / Recruiters / Collection agents',
        },
        {
          id: 7,
          opened: false,
          question: 'How can i see reports about my campaign?',
          answer: 'In the Client dashboard, (currently under construction)  there is a campaign manager tab, where you can view the daily activity log with statistics about your agent’s performance and progress.',
        },
        {
          id: 8,
          opened: false,
          question: 'Can i refer a friend or other business / do you have an affiliate program?',
          answer: 'Yes if you refer a friend that has an active subscription, we would offer  10 percent referral payout fee to the subscriptions total value. This can be applied as a discount to your subscription if active or as a cash pay out.',
        },

      ],
    }
  },
  methods: {
    toggleAnswer(faq_id) {
      let faqs = this.faqs;
      $.each(faqs, function(i) {
        if (faqs[i].id === faq_id) {
          faqs[i].opened = !faqs[i].opened;
          if (faqs[i].opened) {
            $('#toggleIcon_' + faq_id).css('transform', 'rotate(180deg)');
          } else {
            $('#toggleIcon_' + faq_id).css('transform', 'rotate(0deg)');
          }
        }

      });
    }
  },
  mounted() {

  }
}
</script>
<style scoped>
.pre-formatted {
  white-space: pre-line;
}
</style>
