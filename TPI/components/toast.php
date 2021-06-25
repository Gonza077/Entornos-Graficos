<!-- Toast -->
<div role="alert" aria-live="assertive" aria-atomic="true" class="toast hide" id="toast">
  <div style="position: absolute; top: 0; right: 0; z-index:1;">
    <div class="toast-header">
      <img src=".\assets\info-circle-fill.svg" aria-hidden="true">
      <strong class="mr-auto" id="toast-header"> Informacion</strong>
      <hr>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body" id="toast-body">    
    </div>
  </div>
</div>
<script>
    function openToast(msg,header,type){
        $("#toast").toast({ delay: 3000 });
        switch (type){
            case 'info':
                $("#toast").addClass('toastInfo');
                break;
            case 'error':
                $("#toast").addClass('toastError');
                break;
            case 'success':
                $("#toast").addClass('toastSucces');
                break;
            default:
                $("#toast").addClass('toastInfo');
                break;
            }
        $('#toast').toast('show');
        $('#toast-body').html(msg);
        $('#toast-header').html(header ? header : "Informacion");
    }
</script>

<style>
.toastInfo{}
.toastInfo > div > .toast-header{
    background: #0072ec;
    }
.toastInfo > div > .toast-header > .mr-auto{
    color: white;
    margin-left: 5px;
}
.toastInfo > div >.toast-body{
    background: #3c9aff;
    color: white;
}


.toastError{}
.toastError > div > .toast-header{
    background: #C82333;
    }
.toastError > div > .toast-header > .mr-auto{
    color: white;
    margin-left: 5px;
}
.toastError > div >.toast-body{
    background: #C82333;
    color: white;
}


.toastSucces{}
.toastSucces > div > .toast-header{
    background: #00C861;
    color: white;
    }
.toastSucces > div > .toast-header > .mr-auto{
    color: #white;
    margin-left: 5px;
}
.toastSucces > div >.toast-body{
    background: #00C861;
    color: white;
}



</style>