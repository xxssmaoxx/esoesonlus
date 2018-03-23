tinymce.init({

		selector: '#testo',

		height: 500,

		menubar: false,

		plugins: [
		    'advlist autolink lists link image charmap print preview anchor textcolor',
		    'searchreplace visualblocks code fullscreen',
		    'insertdatetime media table contextmenu paste code help wordcount'],

		toolbar: 'insert | undo redo |  formatselect | bold italic underline backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat',

		content_css: [
		    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
		    '//www.tinymce.com/css/codepen.min.css'],

		language : 'it'

		});