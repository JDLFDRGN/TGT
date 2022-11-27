<script>
	$(document).ready(function() {

		var table = $('#example').DataTable({
				responsive: true
			})
			.columns.adjust()
			.responsive.recalc();
      
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


</script>





