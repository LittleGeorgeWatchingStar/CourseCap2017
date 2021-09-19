@extends('layouts.app')
@section('content')
@include('includes.'.$header)

<section class="padding_content">
	<div class="container box">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="faq_heading">
				<h1>Terms and Conditions</h1>
			</div>
			<div class="tab_sec_faq terms">
				<div class="row">
					<div class="col-sm-12">
						<div class="terms_inner">
							<p>Please read these Terms and Conditions ("Terms", "Terms and Conditions") carefully before using the <a href="{{url('privacy-policy')}}">{{url('privacy-policy')}}</a> website and the CourseCap mobile application (together, or individually, the "Service") operated by Craton Service Inc. ("us", "we", or "our"). DBA “CourseCap”</p>
							<h3>About Our Services</h3>
							<p>We provide a platform for students to connect with teaching individuals (also “tutors”) through question and answer format. Our platform allows students to upload questions through the mobile app, and our tutors will provide responses within a short timeframe.</p>
							<p>Students will select a school level, subject and inquiry type, put down a deposit and upload related documents. Once a tutor reviews and accepts a task, an answer will be provided within the allotted time. The app allows the students to pay for the tutors services seamlessly using Stripe’s built in payment integrated API, and all funds that are deposited will appear as credits on the account. Students will not be allowed to withdraw funds once deposited, and tutors will be able to withdraw funds when the funds reach the amount outlined in the Tutor Policy.</p>
							<p>The Tutor agrees to not offer any services to CourseCap students or parents outside of the CourseCap platform. Tutor agrees to not solicit or offer tutoring to CourseCap students at any time without permission. If the tutor violates these terms he or she can be removed from the CourseCap platform. There will be a small commission fee withdrawn from each transaction that occurs on the Tutor’s account.</p>
							<p>By accessing or using the Service you agree to be bound by these Terms. If you disagree with any part of the terms then you do not have permission to access the Service.</p>
							<h3>Communications</h3>
							<p>By creating an Account on our service, you agree to subscribe to newsletters, marketing or promotional materials and other information we may send. However, you may opt out of receiving any, or all, of these communications from us by following the unsubscribe link or instructions provided in any email we send.</p>
							<h3>Independent Contractor Agreement</h3>
							<p>TUTORS ENTER INTO THIS AGREEMENT AS, AND SHALL CONTINUE TO BE, AN INDEPENDENT CONTRACTOR, NOT AN EMPLOYEE. Under no circumstances shall Tutors look to CourseCap and or Craton Software Inc. or any of CourseCap’s Clients as his/her employer, or as a partner, agent, or principal. The Tutor shall not be entitled to any benefits afforded to CourseCap and Affiliates employees’ including worker’s compensation, disability insurance, vacation or sick pay, etc. The Tutor shall be responsible for providing, at the Tutor’s expense, and in the Tutor’s name, disability, worker’s compensation or other insurance as well as licenses and permits usual or necessary for performing the Service(s) including, but not limited to, all applicable city business tax applications.</p>
							<p> The Tutor shall pay, when and as due, any and all taxes incurred as a result of the Tutor’s compensation, including estimated taxes, and shall provide CourseCap and Affiliates with proof of payment on demand.&nbsp; The Tutor further acknowledges that CourseCap and Affiliates will not withhold taxes nor make social security, unemployment insurance, disability insurance nor other contributions for or on the Tutor’s behalf. The Tutor understands that he or she shall be responsible for the estimation and timely payment of any federal or provincial income taxes. The Tutor represents that he or she has the requisite educational, academic, or work background necessary to provide the Service(s). As requested, the Tutor shall provide CourseCap and Affiliates with all certificates or other evidence of such qualifications.</p>
							<p>CourseCap and Affiliates is not responsible for any educational costs, which the Tutors may incur or be required to incur, including, but not limited to, the cost of obtaining copies of appropriate certificates. The Tutor agrees to defend and indemnify CourseCap and Affiliates for any claims, losses, costs, fees, liabilities, damages or injuries suffered by CourseCap and Affiliates arising out of the Tutor’s breach of this section. The Tutor further agrees to defend, indemnify and hold CourseCap and Affiliates harmless from all claims, losses, expenses, fees (including attorney fees), costs, settlements, and judgments arising out of or related to the Tutor’s performance of the Service(s) or any breach by the Tutor hereunder, or any and all claims arising from the Tutor’s actions, including any alleged tort claims.&nbsp; This indemnity shall survive any termination or expiration of this Agreement.</p>
							<h3>Limitations of Our service</h3>
							<p>CourseCap offers Services to help our users receive academic help on questions, homework assignments or school projects.</p>
							<p>We have no control over the quality, knowledge, punctuality, or legality of the services the tutors deliver. CourseCap does not have control over the tutors or the students, integrity, actions, character, or reliability. We do not make any representation of the accuracy of the services performed by tutors action and integrity and/or of the Student.</p>
							<p>CourseCap is not responsible for the conduct, whether online or offline, of any student, tutor or other user of the website/Mobile APP or Services.</p>
							<h3>Purchases</h3>
							<p>If you wish to purchase any product or service made available through the Service ("Purchase"), you may be asked to supply certain information relevant to your Purchase including, without limitation, your credit card number, the expiration date of your credit card, your billing address, and your shipping information.</p>
							<p>You represent and warrant that: (i) you have the legal right to use any credit card(s) or other payment method(s) in connection with any Purchase; and that (ii) the information you supply to us is true, correct and complete.</p>
							<p>The service may employ the use of third party services for the purpose of facilitating payment and the completion of Purchases. By submitting your information, you grant us the right to provide the information to these third parties subject to our Privacy Policy.</p>
							<h3>Payments</h3>
							<p>Payment processing services for Students and Tutors on [CourseCap] are provided by a third-party, and all purchase are subject to that third-party’s own Terms of Service. By agreeing to [this agreement / these terms / etc.] or continuing to operate as a [Student or Tutor] on [CourseCap], you agree to be bound by the third-party’s Terms of Service or known as “Agreement”, as the same may be modified by the third-party from time to time. As a condition of [CourseCap] enabling payment processing services through a third-party, you agree to provide [CourseCap] accurate and complete information about you and your business, and you authorize [CourseCap] to share it and transaction information related to your use of the payment processing services provided by Stripe.</p>
							<p>We reserve the right to refuse or cancel your order at any time for reasons including but not limited to: product or service availability, errors in the description or price of the product or service, error in your order or other reasons</p>
							<p>We reserve the right to refuse or cancel your order if fraud or an unauthorized or illegal transaction is suspected.</p>
							<h3>Availability, Errors and Inaccuracies</h3>
							<p>We are constantly updating product and service offerings on the Service. We may experience delays in updating information on the Service and in our advertising on other web sites. The information found on the Service may contain errors or inaccuracies and may not be complete or current. Products or services may be mispriced, described inaccurately, 
							or unavailable on the Service and we cannot guarantee the accuracy or completeness of any information found on the Service.</p>
							<p>We therefore reserve the right to change or update information and to correct errors, inaccuracies, or omissions at any time without prior notice.</p>
							<h3>Contests, Sweepstakes and Promotions</h3>
							<p>Any contests, sweepstakes or other promotions (collectively, "Promotions") made available through the Service may be governed by rules that are separate from these Terms &amp; Conditions. If you participate in any Promotions, please review the applicable rules as well as our Privacy Policy. If the rules for a Promotion conflict with these Terms and Conditions, the Promotion rules will apply.</p>
							<h3>Content</h3>
							<p>Our Service allows you to post, link, store, share and otherwise make available certain information, text, graphics, videos, or other material ("Content"). You are responsible for the Content that you post on or through the Service, including its legality, reliability, and appropriateness.</p>
							<p>By posting Content on or through the Service, You represent and warrant that: (i) the Content is yours (you own it) and/or you have the right to use it and the right to grant us the rights and license as provided in these Terms, and (ii) that the posting of your Content on or through the Service does not violate the privacy rights, publicity rights, copyrights, 
							contract rights or any other rights of any person or entity. We reserve the right to terminate the account of anyone found to be infringing on a copyright.</p>
							<p>You retain any and all of your rights to any Content you submit, post or display on or through the Service and you are responsible for protecting those rights. We take no responsibility and assume no liability for Content you or any third party posts on or through the Service. However, by posting Content using the Service you grant us the right and license to use, modify, publicly perform, publicly display, reproduce, and distribute such Content on and through the Service.</p>
							<p>Craton Software Inc. has the right but not the obligation to monitor and edit all Content provided by users. Croaton Software Inc. has the right to assist all its users to share or sell all content users create through the Answer Share feature.</p>
							<p>In addition, Content found on or through this Service are the property of Craton Software Inc. or used with permission. You may not distribute, modify, transmit, reuse, download, repost, copy, or use said Content, whether in whole or in part, for commercial purposes or for personal gain, without express advance written permission from us.</p>
							<h3>Accounts</h3>
							<p>AccountsWhen you create an account with us, you guarantee that you are above the age of 18, and that the information you provide us is accurate, complete, and current at all times. Inaccurate, incomplete, or obsolete information may result in the immediate termination of your account on the Service.</p>
							<p>You are responsible for maintaining the confidentiality of your account and password, including but not limited to the restriction of access to your computer and/or account. You agree to accept responsibility for any and all activities or actions that occur under your account and/or password, whether your password is with our Service or a third-party service. You must notify us immediately upon becoming aware of any breach of security or unauthorized use of your account.</p>
							<p>You may not use as a username the name of another person or entity or that is not lawfully available for use, a name or trademark that is subject to any rights of another person or entity other than you, without appropriate authorization. You may not use as a username any name that is offensive, vulgar or obscene.</p>
							<p>We reserve the right to refuse service, terminate accounts, remove or edit content, or cancel orders in our sole discretion.</p>
							<h3>Parents, Teen providers, caretakers</h3>
							<p>If you are under eighteen (18) years of age you are not allowed to make an account as neither a tutor nor as a student. You must have a legal guardians consent to apply, sign-in, or request at tutor at all times.</p>
							<p>A parent or legal guardian can have their own account for a child less than 18 years of age. However, as a parent user if you give your consent for your child or teen to use CourseCap you must agree to monitor your Childs account, both on and off of the Site, including monitoring who your child/teen communicates with and meets both on and off the Site and with or from whom he or she agrees receive tutoring services.</p>
							<h3>Intellectual Property</h3>
							<p>The Service and its original content (excluding Content provided by users), features and functionality are and will remain the exclusive property of Craton Software Inc. and its licensors. The Service is protected by copyright, trademark, and other laws of both the Canada and foreign countries. Our trademarks and trade dress may not be used in connection with any product or service without the prior written consent of Craton Software Inc..</p>
							<h3>Links To Other Web Sites</h3>
							<p>Our Service may contain links to third party web sites or services that are not owned or controlled by Craton Software Inc..</p>
							<p>Craton Software Inc. has no control over, and assumes no responsibility for the content, privacy policies, or practices of any third party web sites or services. We do not warrant the offerings of any of these entities/individuals or their websites.</p>
							<p>You acknowledge and agree that Craton Software Inc. shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such third party web sites or services.</p>
							<p>We strongly advise you to read the terms and conditions and privacy policies of any third party web sites or services that you visit.</p>
							<h3>Termination</h3>
							<p>We may terminate or suspend your account and bar access to the Service immediately, without prior notice or liability, under our sole discretion, for any reason whatsoever and without limitation, including but not limited to a breach of the Terms.</p>
							<p>If you wish to terminate your account, you may simply discontinue using the Service.</p>
							<p>All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</p>
							<h3>Refunds</h3>
							<p>All services are non refundable</p>
							<h3>Indemnification</h3>
							<p>You agree to defend, indemnify and hold harmless Craton Software Inc. and its licensee and licensors, and their employees, contractors, agents, officers and directors, from and against any and all claims, damages, obligations, losses, liabilities, costs or debt, and expenses (including but not limited to attorney's fees), resulting from or arising out of a) your use and access of the Service, by you or any person using your account and password; b) a breach of these Terms, or c) Content posted on the Service.</p>
							<h3>Limitation Of Liability</h3>
							<p>In no event shall Craton Software Inc., nor its directors, employees, partners, agents, suppliers, or affiliates, be liable for any indirect, incidental, special, consequential or punitive damages, including without limitation, loss of profits, data, use, goodwill, or other intangible losses, resulting from (i) your access to or use of or inability to access or use the Service; (ii) any conduct or content of any third party on the Service; (iii) any content obtained from the Service; and (iv) unauthorized access, use or alteration of your transmissions or content, whether based on warranty, contract, tort (including negligence) or any other legal theory, whether or not we have been informed of the possibility of such damage, and even if a remedy set forth herein is found to have failed of its essential purpose.</p>
							<h3>Disclaimer</h3>
							<p>Your use of the Service is at your sole risk. The Service is provided on an "AS IS" and "AS AVAILABLE" basis. The Service is provided without warranties of any kind, whether express or implied, including, but not limited to, implied warranties of merchantability, fitness for a particular purpose, non-infringement or course of performance.</p>
							<p>Craton Software Inc. its subsidiaries, affiliates, and its licensors do not warrant that a) the Service will function uninterrupted, secure or available at any particular time or location; b) any errors or defects will be corrected; c) the Service is free of viruses or other harmful components; or d) the results of using the Service will meet your requirements.</p>
							<h3>Exclusions</h3>
							<p>Some jurisdictions do not allow the exclusion of certain warranties or the exclusion or limitation of liability for consequential or incidental damages, so the limitations above may not apply to you.</p>
							<h3>Governing Law</h3>
							<p>These Terms shall be governed and construed in accordance with the laws of Canada, without regard to its conflict of law provisions.</p>
							<p>Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights. If any provision of these Terms is held to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain in effect. These Terms constitute the entire agreement between us regarding our Service, and supersede and replace any prior agreements we might have had between us regarding the Service.</p>
							<h3>Changes</h3>
							<p>We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material we will provide at least 30 days notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.</p>
							<p>By continuing to access or use our Service after any revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, you are no longer authorized to use the Service.</p>
							<h3>Privacy Policies</h3>
							<p>Please refer to our privacy policies tab or view it on our website:&nbsp;<a href="{{url('privacy-policy')}}">{{url('privacy-policy')}}</a></p>
							<h3>Contact Us</h3>
						<p>If you have any questions about these Terms, please contact us. <a href="mailto:info@coursecap.com">info@coursecap.com</a></p>					</div>
					</div>
				</div>
			</div></div>
	</div>
</section>

@endsection

@section('scripts')
<script type="text/javascript">
	$(document).on('click', '#send_message', function(event) {
		$("#full_loader").show();
		$.ajax({
			url: '{{url("student/send_comment")}}',
			type: 'POST',
			data: {
				temp:$("#message").val()
			},
		})
		.done(function(response) {
			toastr.successful("sent successful");
		})
		.fail(function() {
			toastr.error("Server not Respond");
			$("#full_loader").hide();
		})
	});
	
</script>
@endsection