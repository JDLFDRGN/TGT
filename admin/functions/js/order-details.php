<script>
	$(document).ready(function() {
        $('.overall').text(computeOverall());  
        $('.terminal > img').hide();
        $('.gross').val(parseFloat($('.subtotal').text()) + parseFloat($('.shipping').text()) + parseFloat($('.coupon').text()));
        $('.shipping-input').val($('.shipping').text());
        $('.net').val($('.overall').text());

        let status = $('.status:checked').attr('id');

        manageStatusButton(status);
        
	});

  //Show and Hide Delete Modal
  function showDeleteModal(doc){
    $('.delete-modal').removeClass('hidden');
    $('.delete-customer-id').val(doc.getAttribute('data-id'));
    $('.delete-customer-profile').val(doc.getAttribute('data-profile'));
  }

  $('.hide-delete-modal').on('click', ()=>{
    $('.delete-modal').addClass('hidden');
  })
  function computeOverall(){
    let overall = parseFloat($('.total').text()) + parseFloat($('.shipping').text());
    return overall.toFixed(2);
  }
  function manageStatusButton(id){
    $('.status').attr('disabled', true);
    if(id == 'new'){
      $('#new').removeAttr('disabled');
      $('#processing').removeAttr('disabled');

      if($('.payment').val() == 'cop')
        $('#received').removeAttr('disabled');
      
    }
    if(id == 'processing'){
      $('#processing').removeAttr('disabled');
      $('#in-transit').removeAttr('disabled');
    }
    if(id == 'in-transit'){
      $('#in-transit').removeAttr('disabled');
      $('#out-for-delivery').removeAttr('disabled');
    }
    if(id == 'out-for-delivery'){
      $('#out-for-delivery').removeAttr('disabled');
    }
    if(id == 'received'){
      $('#received').removeAttr('disabled');
    }
    if(id == 'cancelled'){
      $('#cancelled').removeAttr('disabled');
    }
  } 
</script>





