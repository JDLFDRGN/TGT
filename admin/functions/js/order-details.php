<script>
	$(document).ready(function() {
        $('.overall').text(computeOverall());  
        $('.terminal > img').hide();
        $('.gross').val(parseFloat($('.subtotal').text()) + parseFloat($('.shipping').text()) + parseFloat($('.coupon').text()));
        $('.shipping-input').val($('.shipping').text());
        $('.net').val($('.overall').text());
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
    let overall = parseFloat($('.total').text()) - parseFloat($('.shipping').text());
    return overall.toFixed(2);
  }
</script>





