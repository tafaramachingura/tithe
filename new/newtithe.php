<div id="newtithe" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">New Tithe</h4>
      </div>
      <!---form ------->
      <form action="" method="post" id='reg'>
      <div class="modal-body">

        <div class='form-group'><label>Name</label>
          <input type="text" class='form-control newinput' placeholder="Enter Name" name='name' id="name" maxlength="10" minlength='3' required >
        </div>
        <div class='form-group'><label>Surname</label>
          <input type="text" class='form-control newinput ' placeholder="Enter Surname" name="sname" id="sname" required minlength='3'>
        </div>

        <div class='form-group'><label>Amout</label>
          <input type="number" class='form-control newinput ' placeholder="Enter Amout" name="amount" id="amount" required step min="1">
        </div>
        <div class='form-group'><label>Month</label>
          <input type="text" class='form-control newinput ' placeholder="05/2020" name="month" id="mon" required >
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit"  id="save" class="btn btn-primary pull-left">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </form>
    </div>

  </div>
</div>


<script>


</script>
