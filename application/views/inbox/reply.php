<div class="col-xlg-10 col-lg-9 col-md-8 border-left">
  <div class="card-body">
    <h3 class="card-title">Compose New Message</h3>
    <div class="message-container"></div>
    <div class="select-user m-b-20">
      <input type="hidden" id="user-type" value="<?= $sender_type; ?>">
    </div>
    <form class="new-message-form" action="javascript:;">
      <div class="form-group">
        <input class="form-control bg-white" id="receiver" name="receiver" placeholder="To:" value="<?= $name ?>" readonly>
      </div>
      <div class="form-group">
        <input class="form-control" id="title" name="title" placeholder="Subject:">
      </div>
      <textarea class="textarea_editor form-control m-b-20" id="message" name="message" rows="15" placeholder="Enter text ..."></textarea>
      <button type="submit" class="btn btn-success"><i class="fa fa-envelope-o"></i> Send </button>
      <button type="button" class="btn btn-dark m-r-20 button-discard"><i class="fa fa-times"></i> Discard </button>
    </form>
  </div>
</div>
</div>
</section>