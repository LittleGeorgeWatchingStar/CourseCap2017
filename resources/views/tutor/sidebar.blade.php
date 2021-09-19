      <div class="col-md-4 col-sm-4">        
        <div class="box sidebar">
          <div class="user-sidebar">
            <div class="user_pic">
              <div class="profile_pic">
                <img src="{{ $userdetails['avatar'] or  asset('/').'/images/student-profile-avatar.png' }}" class="img-circle img-responsive">
              </div>
            </div>
            <div class="user-name ">
             <div class="user-name ">{{$userdetails['username']}}</div>
            </div>
          </div>

          <div class="profile-progess">
            <div><label>Level {{$userdetails['rate']['level']}}:</label> <span class="pull-right">{{$userdetails['rate']['current']}}/{{$userdetails['rate']['next']}}</span></div>
            <div class="progress">
            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{($userdetails['rate']['current']/$userdetails['rate']['next'])*100}}%;">
              <span class="sr-only">{{($userdetails['rate']['current']/$userdetails['rate']['next'])*100}}% Complete</span>
            </div>
          </div>
          </div>

          <div class="question-list">
            <ul class="list-unstyled">
              <li><img src="{{asset('/')}}/images/pending-b.png">
             Pending: ${{$userdetails['frozen_balance']/100}}</li>
              <li><img src="{{asset('/')}}/images/balance-b.png">
             Balance ${{$userdetails['balance']}}</li>
            </ul>            
          </div>          
           <button type="button"  data-toggle="modal" data-target="#withdrawl"  class="btn btn-block btn-lg btn-outline-info">Withdrawal</button>
            <h2>MY TASKS</h2>
            <ul class="question-list list-unstyled">
              <li><a href="{{url('tutor/my?req=3')}}"><img src="{{asset('/')}}/images/commit-b.png"> Committed Tasks ({{$userdetails['sidebar']['committed']}})</a></li>
              <li><a href="{{url('tutor/my?req=2')}}"><img src="{{asset('/')}}/images/allque-b.png"> All Questions @if(isset($userdetails['sidebar']['all'])) ({{$userdetails['sidebar']['all']}}) @endif</a></li>
              <li><a href="{{url('tutor/disputes')}}"><img src="{{asset('/')}}/images/disputes-b.png"> Disputes @if(isset($userdetails['sidebar']['disputes'])) ({{$userdetails['sidebar']['disputes']}}) @endif</a></li>
            </ul>         
        </div>
      

        <div class="box sidebar">
           <h4 class="sidebar-heading">All Subjects</h4>
            <ul class="sidebar-links">
               <li><a class="side_bar_filter" data="" href="{{url('tutor/dashboard')}}">All</a></li>
             @foreach ($subjects as $subject)
             <li><a class="side_bar_filter" data="" href="{{url('tutor/search?subject='.$subject['id'])}}">{{ $subject['name'] }}</a></li>
             @endforeach  
             <input type="hidden" value="" name="pkk" id="filter_subject">       
            </ul>
         </div>


          <div class="box sidebar">
           <h4 class="sidebar-heading">STATS</h4>
          <table class="table state-table">
            <tr>
              <td>Total Memebers</td>
              <td class="text-right status-count">{{$userdetails['sidebar']['members']}}</td>
            </tr>
            <tr>
              <td>Total Questions</td>
              <td class="text-right status-count">{{$userdetails['sidebar']['questions']}}</td>
            </tr>
            <tr>
              <td>Visitors Today</td>
              <td class="text-right status-count">{{$userdetails['sidebar']['visited']}}</td>
            </tr>
          </table>
        </div>
      </div>
      <!-- Modal -->
<div class="modal fade withdrawl" id="withdrawl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>        
      </div>
      <div class="modal-body">
        <h1>Withdraw to your Paypal</h1>
        <p class="lighlite">It takes up to 5 business day to process </p>
        <form id="withdraw" action="{{url('tutor/withdraw')}}" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Withdraw Amount</label>
            <input type="number"  class="form-control input-lg" name="withdraw_amt">
          </div>
          <p><small>* $5 dollor will be changed if withdraw amount is lower then $100</small></p>

          <div class="form-group">
            <label>Email <small>(Email associated with your Paypal account)</small></label>
            <input type="email" class="form-control input-lg" name="email" placeholder="Enter your Paypal email address">
          </div>
          <p><small>* Paypal processing fees may apply for Paypal payments.</small></p>
          <div class="form-group text-center">
            {{csrf_field()}}
            <button type="submit" class="btn btn-info btn-rounded">Withdraw</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  jQuery(document).ready(function() {
$("#withdraw").validate({
                errorPlacement: function(error, element) {error.insertAfter(element);
                 },
                ignore: [],
                 rules: {
                        email: {
                                     required: true,
                                     email: true,
                                     laxEmail: true,             
                                },
                        withdraw_amt:{
                                    required: true,
                                    min:1,
                                    number: true
                                  },        
                     },
            error: function(data){
                toster.error("please fill required field");
            }
                    });
});
</script>
