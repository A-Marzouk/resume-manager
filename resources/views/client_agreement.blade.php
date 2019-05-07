@extends('layouts.client-app')

@section('content')
    <div class="container">
        <h1 class="pageHeading">Client Agreement</h1><br/>
        <?php
            $text="
            123 Workforce

            TERMS AND CONDITIONS


            123 Workforce Standard Terms and Conditions For the Supply of Temporary Staffing.


            Recruitment / staffing services performed by 123 Workforce or any of its associates

            whereby Freelancers for temporary work (”Freelancer”) are introduced to Clients (”Client”) shall

            be subject to the following terms and conditions:


            Agreement to these terms are in automatically in place once booking is made and payment is received.


            1. DEFINITIONS


            1.1. In these Terms of Business the following definitions apply:

            “Freelancer” means the person introduced by the Company to the Client for an Engagement of work.

            “Client” means the person; firm or corporate body together with any Subsidiary or
            associated Company. “Company” means 123 Workforce.

            “Engagement” means the engagement, employment or use of the Freelancer by the Client, or any third party on a permanent or temporary basis, whether under a contract of service or for services; under a Company, licence, franchise or partnership agreement; or any other engagement; directly or through a limited company of which the Freelancer is an officer, contractor or employee.

            “Introduction” means (i) the Client’s interview of a Freelancer in person, video call or by telephone, following the Client’s instruction to the Company to search for a Freelancer: or (ii) the passing to the Client of a curriculum vitae or information which identifies the Freelancer and which leads to an Engagement of that Freelancer;


            1.2. Unless the context requires otherwise, references to the singular include the plural.


            1.3. The headings contained in these Terms of Business are for convenience only and do not affect their interpretation.


            2. PAYMENT OF FEES


            a) The Fee(s) becomes payable by the Client if a Freelancer accepts an offer of
            Engagement and a start date is agreed. Upon such acceptance, 123 Workforce will invoice the Client for the Fee.

            b) All communications, interviews and offers of employment shall be made via 123 Workforce platform. Failure to inform 123 Workforce that an offer has been made, or that an Freelancer has commenced employment, or to provide 123 Workforce with all details of the Remuneration Package will result in a Fee being charged equivalent to £10,000 or 35% of the anticipated or actual Remuneration Package, whichever is the greater.



            A Client must;

            2. Pay the weekly Fee agreed at a time ahead (advance payment) of the commencement of the date/ time of 123 Workforce’s invoice (the “Due Date”).

            3. If asked to do so, provide 123 Workforce with full details of the remuneration package actually received by or paid to the benefit of the Freelancer for the first year of his or her Engagement (and copies of any relevant contract and other documents if 123 Workforce so requests). 123 Workforce reserves the right to charge an additional fee on the difference between the remuneration package actually received (if it is higher) and that used for the calculation of the Fee.

            c) 123 Workforce will calculate and invoice the Client for the Fee and for any other sum payable by the Client under these terms. Unless there is an obvious error in any calculation shown on any invoice, the invoiced sum will be final and binding as the sum due from the Client. It is absolutely essential that the Fee and any Other invoiced sum is paid, without deduction, by the Due Date.

            d) The Client must not make any deduction from, or assert or exercise any set-off or
            other right or claim against the Fee, any other invoiced sum or any interest that may
            become payable under Clause 3. Below.

            e) If the Fee or any other invoiced sum is not paid by the Due Date and in full, then:

            1. 123 Workforce shall be entitled to levy (a) a one-off late payment charge equivalent of up to 35 % of the value of the unpaid invoice that has not been settled by the Due Date; and/or (b) interest and associated charges as prescribed by the Late Payment Of Commercial Debts (Interest) Act 1998. Such late payment charges shall be payable immediately by the Client upon notification by 123 Workforce.

            2. 123 Workforce may give notice to the Client terminating or, at its option, suspending, in either case with immediate effect, its performance of and any of its obligations under this and any other agreement then in force between itself and the Client, until the outstanding balance and any interest has been paid in full. 123 Workforce will not incur any liability, upon any basis or for any reason, for any Losses resulting from, and the Client will indemnify Agency against any Losses it incurs as a result of, any such termination or suspension. A termination or suspension will not release the Client from performance of, or any of its obligations under, or otherwise vary the terms of any agreement.

            3. 123 Workforce may also recover from the Client, as a sum due under these terms, any costs or other expenses it incurs, in enforcing and recovering any payments due from the Client




            3. REFUND OF FEES

            (a) If a recruitment fee has been paid to 123 Workforce prior to the engagement of a Freelancer, and if the Client terminates the engagement of the Freelancer within the weeks for reasons of poor performance or gross misconduct, the termination date being taken as the actual date of departure in the event of no notice being given or, the final day of notice period (or the notice period indicated by the extent of ex-gratia payment made), 123 Workforce may EITHER:

            Make a refund to the Client in proportion to the number of hours remaining (of the part week) between the date of commencement and termination, as follows:

            OR: use its best endeavours to find suitable replacement staff, in which case 123 Workforce’s right to any further additional recruitment fees shall be waived. The prepaid hourly rate shall continue.


            4. WARRANTY AND LIABILITY

            123 Workforce warrants only that it has taken reasonable measures to ensure that statements and claims made by Freelancers are reasonable and accurate, and references are correctly verified. 123 Workforce accepts no liability for any losses whether direct or indirect, resulting from information supplied by the Freelancer to 123 Workforce and subsequently supplied in good faith by 123 Workforce to the Client.


            5. VARIATION OF TERMS

            Any variation of or change to the terms herein shall be valid only if expressed in writing.


            6. LAW.

            These Terms are governed by the law of Ireland and are subject to the exclusive
            jurisdiction of the Courts of Ireland


            Client Name: $client->name


            Job Title of company representative : $client->agency

            Signed for and on behalf of the client by name : $client->name

            Digital Signature of representative : $client->name

            Date: ".$client->created_at->format(' d / m / Y ')."


            123 Workforce Representative : Conor Marjoram

            Date :  11th Feb 2019
            Signature - Conor Marjoram
            Email Address: 123@123workforce.com

            Website: www.123workforce.com

            Telephone: +44 203 7000685




            ";
        ?>

        {!! nl2br($text) !!}
    </div>
@endsection