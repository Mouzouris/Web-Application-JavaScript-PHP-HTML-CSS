$('.getPreview').on('click', function(ev){
	ev.preventDefault();
	

var myVars = {"EventsID" : $(this).attr('data-id')};
var currentNode = $(this);
var detailsNode = $(this).parents('.grid').find('.fullDetails');
//console.dir(detailsNode);
	if($(this).html() === 'Preview'){
$.get('data/getPreview.php', myVars, function(myData){
	//console.info('hi');
	//console.dir(myData);}, 
	
	$(detailsNode).html(myData.Info).fadeIn(500); 
	$(currentNode).html('Hide Preview');
}, 'json');
	}else{ $(detailsNode).html('').hide(400); $(currentNode).html('Preview'); }

});

