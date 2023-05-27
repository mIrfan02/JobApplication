<footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © AlrightTech 2023</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Alright@gmail.com</span>
    </div>
    </footer>
    <!-- partial -->
  </div>
  <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="{{asset('vendors/base/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="{{asset('vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net/jquery.dataTables.js')}}"></script>
<script src="{{asset('vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{asset('js/off-canvas.js')}}"></script>
<script src="{{asset('js/hoverable-collapse.js')}}"></script>
<script src="{{asset('js/template.js')}}"></script>

<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{asset('js/alert.js')}}"></script>

<script src="{{asset('js/dashboard.js')}}"></script>
<script src="{{asset('js/data-table.js')}}"></script>
<script src="{{asset('js/jquery.dataTables.js')}}"></script>
<script src="{{asset('js/dataTables.bootstrap4.js')}}"></script>
<!-- End custom js for this page-->
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script src="{{asset('js/jquery.cookie.js')}}" type="text/javascript"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('js/jquery-3.6.4.min.js')}}"></script>
<script src="{{asset('js/jquery.js')}}"></script>
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap4.min.js"></script>




<script>
  $(document).ready(function() {
    $('#example').DataTable();

  });
// 

 function modalopen(email){
    // console.log("teets");
    
          $('#recipient-email').val(email);
          $('#email-modal').modal('show');
      
   
 }

 function modelclose(){
    $('#email-modal').modal('hide');
 }



    
 function Message(id){
  $('#user_id').val(id);
  $('#customModal').modal('show');
  console.log("click");
 }
    
 function Emailclose(){
    $('#customModal').modal('hide');
 }

 function MessageToAll(){
 
  $('#MsgModal').modal('show');
  console.log("click");
 }
    
 function MsgAllclose(){
    $('#MsgModal').modal('hide');
 }
  
</script>

</body>

</html>
