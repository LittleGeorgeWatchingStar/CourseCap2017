@extends('layouts.app')
@section('content')
@include('includes.'.$header)


<section class="padding_content">
	<div class="container box">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="faq_heading">
				<h1>Frequently Asked Questions</h1>
			</div>
			<div class="tab_sec_faq">
				<div class="row">
					<div class="col-sm-12">
						<div class="tab_sec_faq_inner">
							<ul class="nav nav-tabs">
								<li class="active"><a data-toggle="tab" href="#home" aria-expanded="true">Students</a></li>
								<li class=""><a data-toggle="tab" href="#menu1" aria-expanded="false">Tutors</a></li>
							</ul>
							
							<div class="faq_search hide">
								<form class="search" action="http://coursecap.com/">
									<input type="text" name="s" placeholder="Search here...">
									<input type="submit" value="">
									<input type="hidden" name="post_type[]" value="students_faq">
									<input type="hidden" name="post_type[]" value="tutors_faq">
								</form>
								
							</div>
							
							<div class="tab-content">
								<div id="home" class="tab-pane fade active in">
									<h3>Getting Started</h3><h4>My question isn’t listed here! What do I do?</h4><p>You may have to create a new question thread and hire a tutor to answer the question. Or you may try to increase your search parameters to find something similar.</p><h4>How do I contact Customer Support?</h4><p>Please send an e-mail to info@coursecap.com with any inquiries you may have. We respond very fast.</p><h4>Is using CourseCap cheating?</h4><p>No. We do not encourage students to plagiarize or to copy the solutions our tutors provide. It is our goal to show students how the answer is derived through step-by-step solution, and for the student to be able to replicate the process.</p><h4>Are you better than the other websites?</h4><p>We are special in our own way. We are not a tutoring agency, but rather a platform. The difference is that we allow anyone to register as a tutor (through a strict vetting process), and we don’t hire any tutors directly. We aim to provide students with much more options and larger subject ranges by acting as a platform.You will likely find faster response times as our platform grows, and you may even choose to join as a tutor as you become more familiar with the platform.</p><h4>Is my identity protected?</h4><p>Absolutely. We do not allow our users to share any information over our platform, albeit some extreme cases. Please take a look at our privacy policy should you have any further questions.</p><h4>Can you help me with my exam/quiz/test?</h4><p>Yes! We regularly collect exam material from all schools to find patterns of test areas. We can 
									help you do better on your exams by helping you get familiar with past material, or, you can receive review material that we prepare for each different course.</p><h4>Can you do my work in less than 24 hours?</h4><p>Depending on the type of work, it is very possible for us to achieve this. Since we are a platform, when your question gets posted, everyone who’s qualified will get notified. This ensures that you will get a fast response.</p><h4>Why use CourseCap?</h4><p>CourseCap provides a platform for students to connect with quality tutors. Students will ask questions in a secure and safe environment. We aren’t a tutoring agency, so our fees will be lower than what you see elsewhere. We also believe that the best person to answer your questions would be an ace student or a teaching assistant in your class.</p><h3>Billing/Prices</h3><h4>How do I contact Customer Support?</h4><p>Send any inquiries to <a href="mailto:info@coursecap.com">info@coursecap.com</a></p><h4>What is your refund policy?</h4><p>If the answer provided was incorrect, or, if the solution did not follow our solution guidelines, the user will receive 100% refund. The user must report the issue within 2 weeks after the tutors’ submission.</p><h4>When do I make a payment for my request?</h4><p>The money is immediately put on hold after a request is submitted. After a tutor has committed to your question, your payment will be withdrawn into a  trust holding status by CourseCap. After the tutor has submitted an answer, the user can choose to release the payment immediately, or be automatically released after a two-weeks’ period, during which, the user can submit any complaints.</p><h4>How do I make a payment for my request?</h4><p>Our app will allow you to pay after you submit a request on your device. Follow the prompts and you will reach a payment page.</p><h4>What kinds of payment do you accept?</h4><p>We accept all types of credit cards through Stripe. </p><h4>Are you cheaper than the other websites?</h4><p>We are, because we are a platform and we do not take a large cut from our tutors. So they will serve you at a lower rate.</p><h4>Can I try out your services for free?</h4><p>Not directly. We do offer many types of programs/activities on our app that will allow you to collect points and receive free services.</p><h4>Are your prices fixed?</h4><p>Yes. We provide a quote for you when you upload your question and should the price need to change, we will always confirm with you prior to any work being committed. We wish to ensure both parties are satisfied with a task prior to any payment or commitment.</p><h4>How much does your service cost?</h4><p>It varies based on the subject, level and urgency. All our prices are listed on the app when you upload the questions.</p><h4>Why do I have to pay for your services?</h4><p>Our tutors go through a strict vetting process in order to answer your questions. Their expertise is well documented and we wish to reward them for theirtime. Our tutors also follow a very strict guideline in answering your questions, and we ensure our students go through this process worry-free by providing a money-back guarantee should the answers not satisfy certain conditions.</p><h3>Requests</h3><h4>How do I contact Customer Support?</h4><p>The best way to reach customer support is through email, we will respond ASAP. Our customer support email is <a href="mailto:info@coursecap.com">info@coursecap.com</a></p><h4>How do I ask for a refund?<br> Do I have to rate my Tutor?</h4><p>You don’t, but it is highly recommended so that the good tutors are recognized by the students. Rating your tutor also helps you collect points so your future questions will receive discounts.</p><h4>My Solution is incorrect! What do I do?</h4><p>Contact our customer service department and we will help you get your refund in process. Make sure to leave a detailed review of the tutor so we can make a note of the situation.</p><h4>My solution is late/incomplete! What do I do?</h4><p>Contact our customer service department and we will help you get your refund in process. Make sure to leave a detailed review of the tutor so we can make a note of the situation.</p><h4>What if my tutor can’t help me?</h4><p>Contact customer service to have another tutor assigned to you. Please outline the reasons why the current tutor does not satisfy you.</p><h4>Why is no one working on my request?</h4><p>Perhaps you have labled the subject or year-level incorrectly. Please review your post criteria, and if everything is correct then please wait a little longer.</p><h4>Is someone working on my request?</h4><p>You will be notified when someone commits to your request.</p><h4>Can I work with the same tutor again?<br> Can I review my previous requests/sessions?</h4><p>Yes. Your past sessions will be available in your account history along with all the solutions that were provided to you.</p><h4>Can I submit my request to a specific tutor?</h4><p>No. Whenever a question is posted, it will be viewable by all tutors that are available.</p><h4>How do I find a tutor?</h4><p>There’s no need for you to look for a tutor. Post your question and we will get a tutor to reach out to you!</p>					</div>
									<div id="menu1" class="tab-pane fade">
									<h3>Becoming a Tutor</h3><h4>Why should I apply to work for CourseCap?</h4><p>For one, the money. We take very little cut out of each transaction, so you will always be compensated fairly for your work. The next reason is that you’re helping out struggling students in their academic endeavors. It should feel good that you’re making the world a smarter place.</p><h4>Why haven’t you hired me yet?</h4><p>Our review process takes 5-7 business days. We will follow up through email, so make sure to check your email regularly during this period and submit any  additional documents we may need.</p><h4>How do I know if I am qualified to be a tutor at CourseCap?</h4><p>We allow users to become a tutor by assessing two main components: achievements and experience. For achievements, it can be either academic, career or research related; and, for experience, it can be education, industry or mentor ship related. Let us know about your education background, how long you’ve been teaching and why you wish to join CourseCap, and we will get an answer to you quickly.</p><h3>For Current Tutors</h3><h4>Does CourseCap report my earnings to CRA or other countries tax authorities?</h4><p>No, it is your responsibility to report your earnings. We will keep a track of payments to you so that you may request it at your discretion. We will not share this info with anyone else.o?</p><h4>What payment services do you use?</h4><p>We use Stripe for our mobile versions.</p><h4>Who pays the transaction fees?</h4><p>The students pay the transaction fees. It is clearly outlined during every transaction.</p><h4>When and how do I get paid?</h4><p>Funds are deposited as balance into your account after every transaction. When you have more than $100.00 CAD in your account, you can choose to withdraw the money and we will mail a cheque to an address of your choosing.</p><h3>Tutor code of conduct</h3><h4>What happens if I break the tutor code of conduct?</h4><p>If conduct is broken while a session is in progress, the user can choose to terminate the session and receive a full refund. If there is conduct broken after a session is complete, CourseCap has the authority to make decisions on whether a partial or full refund will be issued to the student. </p><h3>Requests are contracts!</h3><h4>My question isn’t listed here! What do I do?</h4><p>Send us an email at <a href="mailto:info@coursecap.com">info@coursecap.com</a> with your question and we will get back to you ASAP. </p><h4>I have a personal emergency! What do I do?</h4><p>Call us! We will help you find a way to salvage a committed session. </p><h4>What happens if my quote gets approved and I’m unable to provide the solution?</h4><p>Forfeit the question and receive a small penalty on tutor commission level. The earlier you do this, the less severe the penalty.</p><h4>What happens if my solution is incorrect?</h4><p>The tutor forfeits parts or all of the payment and will receive a penalty on their commission level.</p><h4>What happens if I’m late with my solution or my solution is incomplete?</h4><p>The tutor forfeits parts or all of the payment and will receive a penalty on their commission level.</p>					</div>
							</div>
						</div>
					</div>
				</div>
				</div></div>
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