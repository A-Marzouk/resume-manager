<template>
    <div class="privacy-container">
        <nav class="navbar navbar-light fixed-top dashboard_navbar">
            <div class="backBtn">
                <a href="/client/dashboard/my-account">
                    <img src="/images/client/arrow_back.png" alt="back-icon">
                    ACCOUNT INFORMATION
                </a>
            </div>
        </nav>
        <div class="container" style="display: flex;justify-content: center;">
            <div class="notificationBar" id="notificationBar" style="display:none ; position:fixed;">
                <div>
                    {{notificationMessage}}
                </div>
                <a href="javascript:void(0)" @click="hideNotification" class="no-decoration" style="color: white;">
                    x
                </a>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="main-grid">
                <div class="header-text">
                    <img src="/images/client/my_account/contract_40px.svg" alt="" class="icon-margin small-image">
                    Talent Contract
                </div>
                <hr/>
                <div class="agreement-main">
                    <div class="agreement-text agreement-margin">
                        This Talent Contract
                        <span style="font-weight: bold;">(THE ”AGREEMENT”)</span> is made and entered into as of
                        <span style="font-weight: bold;">(“Effective Date”)</span> BY AND BETWEEN _______________,   a corporation or other entity organized
                        under the laws of __________________________ and having its principal place of business at
                        _______________________________________________ (“Client”), and 123workforce, with a mailing address at  2 dublin landings Dublin , Ireland (“123workforce”).
                        WHEREAS, 123workforce has a proprietary network of select independent contractors (singularly and plural herein,
                        “Talent”) that specialize in providing engineering and/or other professional services to 123workforce’s enterprise
                        clients under 123workforce’s unique Enterprise Sourced Talent Program;
                        WHEREAS, Client desires to participate in 123workforce’s Enterprise Sourced Talent Program and thus retain 123workforce
                        to find Talent for Client, to facilitate payments between Client and Talent and, if requested, facilitate Client’s
                        paperwork between Talent and Client (the “Service”); and
                        WHEREAS, Client and 123workforce will create one or more Talent Outline Plan(s) (“TOP”) for the Talent, which
                        will describe fee rates and duration of services as agreed between the Parties, and the Talent services (“Work”)
                        as specified and monitored solely by Client.
                        Accordingly, the parties agree as follows:
                        <br/>


                    </div>
                    <div class="blue-part">
                        1. Trial Program; Work and TOPs; Client Cooperation.
                    </div>
                    <div class="agreement-text agreement-main-text">
                        1.1. Trial Program. Client and 123workforce will agree on an initial trial period (“Trial Period”) for each Talent provided under
                        this Agreement. The length of the Trial Period will be set out in a TOP, signed and attached as Exhibit A. If the length
                        of the Trial Period is not stated in the applicable TOP, the Trial Period will be ten (10) business days. During the Trial
                        Period, the Talent will provide the Work described in the TOP on a trial basis, as follows:
                        If Client is not completely satisfied with a particular Talent’s Work at the end of the Trial Period, Client will describe in
                        writing the reasons for its dissatisfaction to 123workforce within one (1) business day after the end of the Trial Period. In such
                        event, 123workforce will not invoice Client for such Talent’s Work during such Trial Period and will provide Client with another
                        Talent for an additional Trial Period. If Client is not satisfied with such alternate Talent, 123workforce will apply the same Trial
                        Period process described for a total of up to five (5) Talent, at which time 123workforce or Client may terminate this Agreement
                        or the applicable TOP by written notice to the other, and such termination will be Client’s sole and exclusive remedy.
                        If Client does not provide 123workforce with such notice during the above time period, the relevant Talent will be deemed
                        acceptable and 123workforce’s normal invoicing will commence, including billing for Work performed during the Trial Period.
                        During and after any Trial Period, Client will be the sole judge of the performance, suitability and capability of each
                        Talent engaged in providing Work, and may, at any time, request the replacement of any Talent who does not meet
                        Client’s performance, suitability and capability requirements. In the event that Client requests a Talent be replaced, or
                        if such Talent becomes unavailable during or after a Trial Period, 123workforce will, as its sole obligation and Client’s exclusive
                        remedy for the same, use commercially reasonable efforts to promptly replace such Talent. Such replacement Talent
                        will be provided subject to the trial program described in this Section 1.1. (“Trial Program”). Notwithstanding anything
                        in this Agreement to the contrary, the Trial Program will only apply to each Talent’s initial engagement with Client
                        under a TOP.
                        1.2. Work and TOPs. 123workforce will use commercially reasonable efforts to make one or more Talent available to perform the
                        Work during, and, as applicable, after each Trial Period. Client and 123workforce intend to execute one or more TOPs, which
                        are hereby incorporated into the Agreement. The first TOP will be attached to this Agreement and signed by Client and
                        123workforce. Subsequent TOPs and changes to existing TOPs may take the form of either (1) an additional or replacement
                        written TOP, with each such written TOP deemed an additional TOP unless the newer TOP expressly states that it
                        supersedes a previous TOP, or (2) an electronic update to Client’s online 123workforce account (located on the access-restricted,
                        Client-portion of www.123workforce.com) that Client is permitted to access with Client’s 123workforce account name and
                        password. 123workforce will not amend Client’s TOPs without Client’s written consent. In the event that a new or changed
                        123workforce, LLC Confidential and Proprietary Page 2
                        Enterprise STA 20201202
                        TOP is memorialized in Client’s online 123workforce account, 123workforce will provide Client with written notice of any such change
                        and Client will have three (3) business days to correct any errors in such change. Client will also be deemed to accept
                        any new or amended TOP if Client allows the beginning or continuation of any Work that is subject to a new rate or if
                        Client does not provide 123workforce with a correction for such change within such notice period. Each TOP will describe the
                        Work performed by Talent, as well as the TOP Start Date, the fees for the Work, the applicable Trial Period, if any, and
                        other relevant information.
                        1.3. Client Cooperation. Client understands that performance of Work depends in part on Client’s actions. Accordingly,
                        Client agreesto provide Talent with any necessary information, cooperation, and assistance in connection with the Work.
                        Each Talent will report directly to an employee or contractor of and designated by Client (“Client Contact”) and the
                        Client Contact will provide such Talent with the specifications and requirements, and establish the expectations, in
                        performing the Work in accordance with Client Contact’s reasonable and lawful instructions. Each Client Contact will
                        be responsible for setting, reviewing, and monitoring the overall project schedule, work schedules, Work Output (defined
                        below), and all other aspects of each project under a TOP and for coordinating the same with the Talent who will
                        otherwise be responsible for the method, manner and means of performing the Work. Client acknowledges and agrees
                        that since Client oversees performance of the Work, and is solely responsible for monitoring Talent, and that since 123workforce
                        does not control or direct the Talent, 123workforce is not in a position to, and does not, warrant or guarantee the quantity or
                        quality of the Work performed nor the Work Output of Talent, or that a Talent will meet any deadlines set or desired by
                        Client. Client will be solely responsible for determining whether any particular Talent meets Client’s needs and
                        objectives. “Work Output” means the code and other tangible results created by Talent and provided to Client under
                        this Agreement.
                        1.4. Time Off. Client will not pay Talent or 123workforce for any vacation time or other days off that the Talent and Client agree Talent
                        can take outside the scope of this agreement (collectively “Time Off”). If applicable to Client’s billing arrangement with
                        123workforce for such Talent, Client and Talent must confirm Time Off via email or 123workforce’s portal for appropriate fee
                        adjustments.
                    </div>

                    <div class="blue-part">
                        2. Fees; Billing Procedures.
                    </div>

                    <div class="agreement-text agreement-main-text">
                        2.1. Client will pay 123workforce the fees set forth in the applicable TOP. 123workforce will invoice Client biweekly for Services provided
                        to Client during the immediately preceding two-week period. All sums will be due to 123workforce Net 10 from the date of
                        123workforce’s invoice.

                        2.2. Client agrees to pay 123workforce all pre-approved, actual and reasonable travel, lodging and other out of pocket expenses
                        incurred by 123workforce in conjunction with the Services or the Talent in conjunction with the Work. All payments are due
                        to 123workforce Net 10 from the date of 123workforce’s invoice.
                        2.3. All payments will be paid electronically via credit card, bank wire, ACH transfer, or PayPal. Past due amounts will
                        incur interest at a rate of one and a half percent (1.5%) per month. In the event of any action by 123workforce to collect any
                        amount not paid when due, Client will reimburse 123workforce’s costs of collection (including, without limitation, any
                        attorneys’ fees and arbitration costs). 123workforce reserves the right to draw or charge amounts due on the due date if client
                        selects ACH or credit card as its payment method.
                    </div>

                    <div class="blue-part">
                        3. Non-Circumvent. Subject to Section
                    </div>

                    <div class="blue-part">
                        4. during the term of this Agreement and for twelve (12) months thereafter
                    </div>

                    <div class="agreement-text agreement-main-text">
                        , Client
                        will not, directly or indirectly, encourage or solicit to hire, or otherwise hire or engage for performance of services
                        (excluding the Work hereunder) any Talent of 123workforce who Client is introduced to by 123workforce in connection with this
                        Agreement. Client also agrees that it will not refer such Talent directly to subsidiaries, parent companies, partnerships,
                        holdings or investors related to Client in any form without processing such request through 123workforce’s client intake
                        processes. Client also agrees that it will not induce any such Talent to recruit or refer talent of any kind to Client or third
                        parties nor will Client cooperate with any efforts of such Talent to do the same.
                        4. Platform Buyout.
                        4.1. Subject to Client’s prior written notice to 123workforce, the right to a reasonable wind-down period described below, and full
                        payment of the buyout fee described in Section 4.2, Client may, at any time during or after the term of this Agreement,
                        opt to directly engage or employ any Talent. Such wind-down period is typically thirty (30) days, but may be reasonably
                        123workforce, LLC Confidential and Proprietary Page 3
                        Enterprise STA 20201202
                        adjusted by 123workforce based on the Talent's then-existing commitments to 123workforce related to 123workforce’s business, including but
                        not limited to commitments to other customers.
                        4.2. With respect to each Client-Hired Talent (defined below), Client will, within thirty (30) days of hiring or engaging such
                        Talent, pay 123workforce a buyout fee of thirty thousand dollars ($30,000). 123workforce’s expenses incurred replacing a Client-Hired
                        Talent cannot be ascertained with certainty, so the parties agree that the buyout fee is a reasonable estimate of 123workforce’s
                        expenses to find, recruit, screen, train and replace each Client-Hired Talent, and otherwise operate its business with
                        respect to such replacement Talent.
                        4.3. "Client-Hired Talent" means a Talent who meets both of the following two criteria: (1) the Talent is introduced to Client
                        by 123workforce and/or the Talent provides or agrees under a TOP to provide Work to Client, and (2) Talent is hired as an
                        employee of or otherwise engaged directly or indirectly by Client, either (i) during the period of time of such Talent’s
                        work for Client under or in connection with this Agreement and twelve (12) months thereafter or (ii) within twelve (12)
                        months of the date such Talent is first introduced by 123workforce to Client if Client elects not to engage such Talent under or
                        in connection with this Agreement.
                    </div>

                    <div class="blue-part">
                        5. Term; Termination.
                    </div>
                    <div class="agreement-text agreement-main-text">
                        This Agreement will commence on the Effective Date and continue in effect until terminated as
                        described in this Section 5. If either Party materially breaches this Agreement, the other Party may immediately
                        terminate this Agreement in its entirety or the affected TOP(s) by giving the breaching Party written notice and a ten
                        (10) business days’ cure period, except for nonpayment for which there will be no cure period. Each Party also may
                        terminate this Agreement in its entirety or a particular TOP hereunder at any time, with or without cause, upon ten (10)
                        business days’ written notice to the other Party. Sections 2, 3, 4, 5, 6.2, 6.3, 7, 8 and 9 will survive any termination or
                        expiration of this Agreement. Upon termination of this Agreement or a TOP, Client agrees to pay 123workforce all amounts
                        due or accrued under the Agreement or TOP as of the date of such termination.
                    </div>

                    <div class="blue-part">
                        6. Warranty and Disclaimer.
                    </div>
                    <div class="agreement-text agreement-main-text">
                        6.1. 123workforce represents, warrants and agrees that: (a) each Talent has been vetted and fully qualified by 123workforce’s proprietary
                        screening system; (b) 123workforce has full power, right and authority to enter into this Agreement, to carry out its obligations
                        herein.
                        6.2. Product and Technology Management Responsibility. Client is solely, exclusively, and entirely responsible for the
                        development of Client’s technology and products including Talent, Talent’s Work and Work Output. Client agrees that
                        it will make Talent aware of all applicable Client’s processes and policies for research, engineering and development
                        employees and other contracted resources. Client is solely responsible for acquiring all rights and licenses to any
                        software, code, tools, information, documentation, or other materials and intellectual property that Client acquires from
                        third parties (excluding Talent) and furnishes to Talent in connection with each TOP and for ensuring that Client has all
                        rights and licenses necessary to enable the Talent to use the same (solely for the Work). EXCEPT AS EXPRESSLY
                        STATED IN SECTION 6 AND 7, CLIENT ASSUMES ALL RISKS WITH RESPECT TO CLIENT’S TECHNOLOGY
                        AND PRODUCTS, INCLUDING ALL WORK, WORK OUTPUT AND MATERIALS INCORPORATED THEREIN.
                        6.3. EXCEPT AS EXPRESSLY PROVIDED IN SUBSECTION 6.1, 123workforce MAKES NO REPRESENTATION OR
                        WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, WITH RESPECT TO THE SERVICES, WORK, WORK
                        OUTPUT OR OTHER RESULTS ARISING FROM OR RELATING TO THIS AGREEMENT, AND 123workforce
                        HEREBY DISCLAIMS ALL OTHER REPRESENTATIONS AND WARRANTIES, INCLUDING ANY IMPLIED
                        WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE OR NONINFRINGEMENT, AND ANY REPRESENTATIONS OR WARRANTIES ARISING FROM COURSE OF
                        DEALING, COURSE OF PERFORMANCE OR USAGE OF TRADE.

                    </div>

                    <div class="blue-part">
                        7. Ownership & Licenses.
                    </div>

                    <div class="agreement-tex agreement-main-text">
                        7.1. Client Ownership Rights. Except for the licensed rights under 7.2 below, 123workforce hereby assigns to Client all right, title
                        and interest owned by and vested in 123workforce or the Talent, in and to all Work provided to Client together with all
                        intellectual property rights 123workforce or the Talent has (including without limitation, patents, copyrights, trade secrets,
                        moral rights ) therein. 123workforce will reasonably assist Client, at Client’s request and expense, to further evidence, record,
                        perfect, and maintain, enforce and defend any rights assigned hereunder.
                        123workforce, LLC Confidential and Proprietary Page 4
                        Enterprise STA 20201202
                        7.2. Client’s License Rights. In the unlikely event that any 123workforce or Talent intellectual property is reasonably necessary to
                        use the Work Output, 123workforce grants to Client a non-exclusive, royalty-free, perpetual, irrevocable, sublicensable,
                        worldwide right and license to fully exercise and exploit the 123workforce or Talent intellectual property and to make derivative
                        works of the same solely in connection with and to the extent reasonably necessary for the exploitation of the Work
                        Output obtained from the Talent.

                    </div>

                    <div class="blue-part">
                        8. Confidentiality.
                    </div>
                    <div class="agreement-text agreement-main-text">
                        8.1. All business, technical or financial information disclosed by one Party to the other Party hereunder will be the
                        “Proprietary Information” of the disclosing Party. All Work Output provided under this Agreement will be deemed
                        the Proprietary Information of Client. For clarity, the Proprietary Information of 123workforce includes, without limitation, the
                        names, contact information, 123workforce’s screening and selection criteria for, rates and particular skills of each Talent in
                        123workforce’s network. Each Party will hold in confidence and not disclose or, except in performing the Services, use any
                        Proprietary Information of the disclosing party. Nothing in this Section 8, however, prohibits 123workforce from reusing the
                        know-how accumulated while providing the Services, or that Talent retain providing the Work and Work Output in their
                        unaided memories for 123workforce’s business including to provide services and work output to 123workforce’s other clients. For
                        purposes of this Section 8 memory is unaided with respect to any Client Proprietary Information if a person (a) has not
                        memorized any Proprietary Information to intentionally evade the confidentiality obligations in this Section 8; and (b)
                        does not incorporate any Proprietary Information provided by Client for the purpose of such reuse. Proprietary
                        Information will not include any information the receiving Party can document (i) is or becomes readily publicly
                        available without restriction through no fault of the receiving Party, or (ii) was in its possession or known by it without
                        restriction prior to receipt from the disclosing Party, or (iii) was rightfully disclosed to it by a third party without
                        restriction, or (iv) was independently developed without use of any Proprietary Information of the disclosing Party by
                        the receiving Party. The receiving Party may make disclosures required by law or court order provided the receiving
                        Party provides the disclosing Party with advance written notice of such disclosure and cooperates with the disclosing
                        Party, at the disclosing Party’s request and cost, in any attempts by the disclosing Party to limit or prevent such
                        disclosure.
                        8.2. Upon termination of this Agreement, and as otherwise requested by the disclosing Party, the receiving Party will (and
                        123workforce will use commercially reasonable efforts to cause Talent to) promptly return to the disclosing Party all items and
                        copies containing or embodying Proprietary Information of the other Party (including, without limitation, all Work
                        Output and all work-in-progress, provided Client has paid 123workforce all fees due and owing). Client agrees that 123workforce and
                        the Talent will have no liability with respect to any Work to the extent that performing such Work is dependent upon
                        access to and/or use of the Client’s Proprietary Information that was returned to Client at Client’s request.
                    </div>

                    <div class="blue-part">
                        9. General.
                    </div>
                    <div class="agreement-text agreement-main-text">
                        9.1. Publicity. After working with 123workforce for more than two weeks following a successful Trial Period with a Talent, 123workforce
                        also may refer to Client on 123workforce’s website or other marketing material which displays clients of 123workforce and to use
                        Client as a possible reference, provided that Client may decline or revoke this permission, by emailing
                        optout@123workforce.com stating that it does not wish to be used as a reference or listed on 123workforce’s website. 123workforce will cease
                        publicity within ten (10) business days of its receipt of such notice. Thirty (30) days following a successful Trial Period
                        with a 123workforce Talent, Client agrees that it and 123workforce will issue a press release or other public statement related to this
                        Agreement.
                        9.2. Relationship of Parties. For all purposes under this Agreement, 123workforce is an independent contractor of Client and the
                        parties hereto are not authorized to and will not bind or attempt to bind the other to any contract. Client acknowledges
                        that 123workforce provided Talent are independent contractors of 123workforce. 123workforce only will be responsible for compensation
                        payable to the Talent and 123workforce’s income taxes in connection with this Agreement, and Client will be responsible for
                        all other taxes and assessments including without limitation, sales, value-added, use and similar taxes, if any.
                        9.3. Dispute Resolution; Choice of Law. This Agreement is made under, and will be construed and enforced in accordance
                        with, the laws of the State of Delaware applicable to agreements made and performed therein, without giving effect to
                        principles of conflicts of law. To the maximum extent permitted by law, all disputes arising under or in connection with
                        this Agreement shall be submitted to Judicial Arbitration and Mediation Services, Inc. (“JAMS”) for binding arbitration
                        in Wilmington, Delaware by a single arbitrator. The arbitrator shall be selected by JAMS in an impartial manner
                        determined by it. The arbitration shall be conducted under the Delaware Uniform Arbitration Act, 10 Delaware Code §
                        123workforce, LLC Confidential and Proprietary Page 5
                        Enterprise STA 20201202
                        5701 et seq. The arbitrator shall have complete authority to render any and all relief, legal and equitable, appropriate
                        under Delaware law. Should a Party assert a claim in court against the other Party over any matter arising under or in
                        connection with this Agreement, or in the event that any matter hereunder is not arbitrable as a matter of law, then the
                        federal or state courts of competent jurisdiction sitting in Delaware shall have exclusive jurisdiction. The Parties hereby
                        submit to the exclusive jurisdiction of such federal or state court in Delaware and waive any claim of inconvenient
                        forum.
                        9.4. Disclaimers and Limitations of Liability.
                        9.4.1. No Consequential Damages. NEITHER PARTY WILL BE LIABLE TO THE OTHER PARTY FOR ANY
                        INCIDENTAL, CONSEQUENTIAL, INDIRECT, SPECIAL, PUNITIVE OR EXEMPLARY DAMAGES
                        (INCLUDING DAMAGES FOR LOSS OF BUSINESS, LOSS OF PROFITS OR THE LIKE) ARISING OUT OF OR
                        RELATING TO THIS AGREEMENT, SUCH PARTY’S PERFORMANCE HEREUNDER, THE USE OR
                        INABILITY TO USE ANY SERVICES OR WORK OUTPUT, OR ANY INTERRUPTION OR DISRUPTION OF OR
                        BY ANY OF THE FOREGOING, EVEN IF A PARTY HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH
                        DAMAGES AND REGARDLESS OF THE CAUSE OF ACTION (WHETHER IN CONTRACT, TORT, BREACH
                        OF WARRANTY OR OTHERWISE).
                        9.4.2. Limitation of Liability. EXCEPT AS EXPRESSLY PROVIDED IN THIS SECTION 9.4.2, THE
                        AGGREGATE LIABILITY OF EACH PARTY WITH REGARD TO OR ARISING UNDER THIS AGREEMENT
                        WILL IN NO EVENT EXCEED THE LESSER OF (A) THE AGGREGATE COMPENSATION PAID BY CLIENT
                        TO 123workforce UNDER THIS AGREEMENT DURING THE SIX (6) MONTHS IMMEDIATELY PRECEDING THE
                        DATE ON WHICH SUCH CLAIM ARISES AND (B) TWO HUNDRED AND FIFTY THOUSAND DOLLARS
                        ($250,000); PROVIDED THAT THE LIMITATIONS OF LIABILITY SET FORTH IN THIS SECTION 9.4.2. WILL
                        NOT BE CONSTRUED OR INTERPRETED TO LIMIT CLIENT’S PAYMENT OBLIGATIONS UNDER
                        SECTIONS 2, 3, OR 4 OF THIS AGREEMENT.
                        9.5. Miscellaneous. Neither party will have the right to assign this Agreement to another party without the other Party’s
                        written consent, except that either Party may, upon written notice to the other Party (and without the other Party’s
                        consent), assign this Agreement in its entirety to a parent company, any subsidiary of a parent company, or an assignee
                        in connection with a corporate reorganization, acquisition, merger, or sale of or substantially all of its assets; provided
                        that the assignee agrees in writing to be bound by all of the terms and conditions of this Agreement. This Agreement,
                        together with each Exhibit A and 123workforce’s Client Platform Access Agreement constitute the entire agreement between
                        the Parties. This Agreement will take precedence over and will govern over any inconsistent or conflicting terms in
                        123workforce’s Client Platform Access Agreement and/or any TOP/Exhibit A (even if signed), unless and solely to the extent
                        that the parties expressly state in such TOP/Exhibit A that they intend to override a specific term of this Agreement. No
                        waiver, change, or modification to this Agreement will be effective unless in writing signed by both Parties. Any notices
                        to 123workforce in connection with this agreement will be made by email transmitted to contact@123workforce.com provided that
                        Client also send a copy of such notice via U.S. mail or nationally recognized carrier to 123workforce, LLC, 2810 N. Church
                        St., #36879, Wilmington, DE 19802-4447, Attn: Contract Administration. Notices to Client will be made by email or
                        regular mail and will be deemed to have been duly given when sent by 123workforce to the email or mailing address associated
                        with Client’s account. The section and subsection headings used in this Agreement are for convenience only and will
                        not be used in interpreting this Agreement. Both Parties have had the opportunity to review and negotiate this Agreement
                        and neither Party will be deemed the drafter of this Agreement for the purposes of interpreting any ambiguity in this
                        Agreement. The Parties agree that this Agreement may be signed by manual or facsimile signatures and in counterparts,
                        each of which will be deemed an original and all of which together will constitute one and the same instrument. In the
                        event that any provision of this Agreement will be determined to be illegal or unenforceable, that provision will be first
                        revised to give the maximum permissible effect to its original intent or, if such revision is not permitted, that specific
                        provision will be eliminated so that this Agreement will otherwise remain in full force and effect and enforceable.
                        123workforce, LLC Client
                        By: _______________________________________________ By: _______________________________________________
                        Name: ______________________________________________ Name: _______________________________________________
                        Title: _______________________________________________ Title: _______________________________________________
                        123workforce, LLC Confidential and Proprietary Page 6
                        Enterprise STA 20201202.docx
                        Deleted: Enterprise STA 20202201.docx
                        Exhibit A
                        Talent Outline Plan #XXX
                        This Talent Outline Plan (“TOP”) is hereby incorporated as Exhibit A of the Enterprise Sourced Talent Agreement
                        (“Agreement”) between 123workforce, LLC, (“123workforce”) and _________________________ (“Client”) with an effective date on or about
                        ________________, 20__. This TOP becomes effective on _______________, 20___ (“Effective Date”). This TOP is subject to
                        the terms of the Agreement that do not directly conflict with the terms of this TOP. Section 9.5 of the Agreement sets forth how
                        any conflict with the terms of the Agreement and this TOP are to be resolved.
                        A. Description of Work:
                        B. Talent Name:
                        C. Client Contact:
                        D. Talent Start Date:
                        E. Trial Period:
                        Duration:
                        End Date of the Trial Period:
                        F. Fees:
                        $________/week per full-time (40hs)
                        $________/week per part-time (20hs)
                        $________ / hour

                        123workforce, LLC Client
                        By: _______________________________________________ By: _______________________________________________
                        Name: ______________________________________________ Name: _______________________________________________
                        Title: _______________________________________________ Title: ______________________
                    </div>

                </div>
                <div class="bluechecked d-flex align-items-center">
                    <label class="checkBoxText checkBoxContainer">
                        <input v-on:change="agree = !agree" type="checkbox" name="remember" v-if="!hasSigned">
                        <input type="checkbox" name="remember" checked disabled v-if="hasSigned">
                        <span class="agreement-checkbox-text">I agree with the privacy agreement</span>
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="col-12 col-md-8 col-lg-6 agreement-signiture">
                    <div class="blue-part" :class="{disabled: !agree}">
                        YOUR SIGNATURE
                    </div>
                    <div class="agreement-text signiture-main-text">
                        <input :disabled="!agree" type="text" placeholder="Jhon Doe" v-model="currentClient.signature">
                    </div>
                </div>
                <hr v-if="!hasSigned"/>
                <div class="d-flex justify-content-end" v-if="!hasSigned">
                    <button style="height: 48px; width: 98px;" class="agreement-button"
                            :class="{disabled: !(currentClient.signature && agree) }" @click="signContract">SIGN
                    </button>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
    export default {
        props: ['client'],
        data() {
            return {
                agree: false,
                hasSigned: false,
                currentClient: {},
                notificationMessage:'Successfully signed contract!',
            }
        },
        methods: {
            signContract() {
                if (!(this.currentClient.signature && this.agree)) {
                    return;
                }
                axios.post('/client/contracts/sign', {
                    type: 'service',
                    signature: this.currentClient.signature
                })
                    .then((response) => {
                        if(response.data.status === 'success'){
                            this.hasSigned = true;
                            this.showSuccessMessage();
                        }
                    })
                    .catch((error) => {
                    });
            },
            hideNotification(){
                $('#notificationBar').css('display','none');
            },
            showSuccessMessage(){
                $('.notificationBar').css('background','#FFBA69') ;
                this.notificationMessage = 'Successfully signed contract!' ;
                $('#notificationBar').fadeIn(600);
                setTimeout(()=>{
                    $('#notificationBar').fadeOut(1500);
                },4000);
            }
        },
        mounted() {
            this.currentClient = this.client;

            if (this.currentClient.agreed_with_service_agreement_at) {
                this.hasSigned = true;
            }
        }
    }
</script>

<style scoped lang="scss">
    .privacy-container{
        max-width: 92%;
        margin: 0 auto;
    }
    .btn-primar:hover{
        color: white;
    }

    .header-text {
        font-size: 1.25rem;
        font-family: Roboto;
        color: #4A5464;
        font-weight: 500;
    }

    .main-grid{
        margin-top: 22px;
    }

    .notificationBar{
        margin-top: -8px;
        z-index: 2;
        width: 1165px;
    }

    @media screen and (max-width: 1270px) {
        .notificationBar{
            width: 96%;
        }
    }

    .agreement-text {
        font-family: Roboto, serif;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        color: #4A5464;
    }

    .agreement-margin {
        padding: 32px 0 40px;
        text-transform: uppercase;
        line-height: 30px;
    }

    .blue-part {
        background: #EDF7FC;
        border-radius: 4px;
        font-weight: bold;
        font-size: 18px;
        line-height: 30px;
        text-transform: uppercase;
        color: #05A4F4;
        padding: 14px 0 14px 24px;

        &.disabled {
            opacity: .4;
        }
    }

    .agreement-main-text {
        padding: 32px 0 40px;
        line-height: 28px;
    }

    .agreement-main {
        background: #FFFFFF;
        box-shadow: 0 2px 18px rgba(179, 183, 186, 0.15);
        border-radius: 4px;
        padding-left: 24px;
        padding-right: 24px;
        margin-top: 32px;
    }
    .chechbox-blue {
        cursor: pointer;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        outline: 0;
        background: #DADADA;
        height: 18px;
        width: 18px;
        border: 1px solid #4A5464;
        margin-right: 15px;
    }

    .bluechecked {
        margin: 51px 0;
    }
    .chechbox-blue:checked {
        background: #05A4F4;
        border: none;
    }

    .chechbox-blue:hover {
        filter: brightness(90%);
    }

    .chechbox-blue:after {
        content: '';
        position: relative;
        left: 30%;
        top: 5%;
        width: 40%;
        height: 80%;
        border: solid #dadada;
        border-width: 0 3px 3px 0;
        transform: rotate(45deg);
        display: none;
    }

    .chechbox-blue:checked:after {
        display: block;
    }

    .agreement-signiture {
        padding: 0 !important;
        background: #FFFFFF;
        box-shadow: 0 3px 18px rgba(179, 183, 186, 0.15);
        border-radius: 4px;
        margin-bottom: 35px;
    }

    .signiture-main-text {
        padding: 40px 0 40px 25px;
        input {
            border: none;
            background: transparent;
            width: 100%;

            &:focus {
                border: none;
                box-shadow: 0;
                outline: none;
            }
        }
    }

    .agreement-button {
        background: #05A4F4;
        border-radius: 2px;
        font-weight: 500;
        font-size: 14px;
        line-height: 16px;
        text-align: center;
        color: #fff;
        border: none;
        padding: 16px 25px;
        margin-top: 6px;
        margin-bottom: 6px;

        &.disabled {
            background: #E4E4E4;
            color: #A1A7AF;
        }
    }

</style>