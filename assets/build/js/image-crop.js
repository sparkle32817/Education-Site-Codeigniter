function toDataURL(url, callback) {
  var xhr = new XMLHttpRequest();
  xhr.onload = function() {
    var reader = new FileReader();
    reader.onloadend = function() {
      callback(reader.result);
    }
    reader.readAsDataURL(xhr.response);
  };
  xhr.open('GET', url);
  xhr.responseType = 'blob';
  xhr.send();
}

window.addEventListener('DOMContentLoaded', function() {

  let avatar = document.getElementById('avatar-img');
  let image = document.getElementById('crop-image');
  let input = document.getElementById('input-avatar-change');
  let $modal = $('#image-crop-modal');
  let cropper;

  input.addEventListener('change', function(e) {

    let files = e.target.files;
    let done = function(url) {
      image.src = url;
      $modal.modal('show');
    };

    if (files && files.length > 0) {
      let file = files[0];

      if (URL) {
        done(URL.createObjectURL(file));
      } else if (FileReader) {
        let reader = new FileReader();
        reader.onload = function(e) {
          done(reader.result);
        };
        reader.readAsDataURL(file);
      }
    }
  });

  $modal.on('shown.bs.modal', function() {
    cropper = new Cropper(image, {
      aspectRatio: 1,
      viewMode: 1,
    });
  }).on('hidden.bs.modal', function() {
    cropper.destroy();
    cropper = null;
  });

  document.getElementById('crop-button').addEventListener('click', function() {

    $modal.modal('hide');

    if (cropper) {
      canvas_pic = cropper.getCroppedCanvas({
        width: 220,
        height: 220,
      });
      avatar.src = canvas_pic.toDataURL();
      canvas_pic = avatar.src;
    }
  });
});