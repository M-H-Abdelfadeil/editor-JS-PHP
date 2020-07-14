<!DOCTYPE html>
<html>
<head>
	<title>text editor</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
	<script src="https://use.fontawesome.com/80513b8285.js"></script>

	

</head>
<style>
	iframe{
		background: #fff
	}
	.imgIc , .selAll{
		margin-left: 12px !important;
	}
	.con{
		padding-left: 30px !important;
	}
	.ic{
		width:40px;height: 40px;
	}
	.selc{
		height: 40px;
	}
	.fontName{
		width : 172px;
		
	}
</style>


<body onload="enableEditeMode();">
	<div class="container mb-3 mt-2">
		<div class="row">
			<div class="con col-3 bg-dark p-3 border border-info border-left-0 border-top-0 border-bottom-0">
				<div class="text-warning mb-3" >Font</div>
				
					<button title="Bold" class="bg-warning border-0 text-dark p-2 ic rounded" onclick="execCmd('bold');"><i class="fa fa-bold"></i></button>
					<button title="italic" class="bg-warning border-0 text-dark p-2 ic rounded" onclick="execCmd('italic');"><i class="fa fa-italic"></i></button>
					<button title="underline" class="bg-warning border-0 text-dark p-2 ic rounded" onclick="execCmd('underline');"><i class="fa fa-underline"></i></button>
					<button title="strikeThrough" class="bg-warning border-0 text-dark p-2 ic rounded" onclick="execCmd('strikeThrough');"><i class="fa fa-strikethrough"></i></button>
					<select title="Heading" class ="bg-warning text-dark ic border-0 rounded" onchange="execCommandWithArg('formatBlock',this.value);">
						<option value="H1">h1</option>
						<option value="H2">h2</option>
						<option value="H3">h3</option>
						<option value="H4">h4</option>
						<option value="H5">h5</option>
						<option value="H6">h6</option>
					</select>
					<br>

					<select title="Font Name" class="mt-3 fontName bg-warning text-dark selc border-0 rounded" onchange="execCommandWithArg('fontName',this.value);">
						<option value="Arial">Arial</option>
						<option value="Comic Sans MS">Comic Sans MS</option>
						<option value="Courier">Courier</option>
						<option value="Georgia">Georgia</option>
						<option value="Tahoma">Tahoma</option>
						<option value="Times New Roman">Times New Roman</option>
						<option value="Verdana">Verdana</option>
					</select>

					<select title="Font Size" class ="bg-warning text-dark ic border-0 rounded" onchange="execCommandWithArg('fontSize',this.value);">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
					</select>
			</div>
			
			<div class="con col-3 bg-dark p-3 border border-info border-left-0 border-top-0 border-bottom-0">
					<div class="text-warning mb-3" >Align</div>
					<button title="justify Left" class="bg-warning border-0 text-dark p-2 ic rounded" onclick="execCmd('justifyLeft');"><i class="fa fa-align-left"></i></button>
					<button title="justify Center" class="bg-warning border-0 text-dark p-2 ic rounded" onclick="execCmd('justifyCenter');"><i class="fa fa-align-center"></i></button>
					<button title="justify Right" class="bg-warning border-0 text-dark p-2 ic rounded" onclick="execCmd('justifyRight');"><i class="fa fa-align-right"></i></button>
					<button title="justify Full" class="bg-warning border-0 text-dark p-2 ic rounded" onclick="execCmd('justifyFull');"><i class="fa fa-align-justify"></i></button>
					<button title="justify insert Line" class="bg-warning border-0 text-dark p-2 ic rounded" onclick="execCmd('insertHorizontalRule');">HR</button>
					
					<br>
					
					<button title="indent" class="bg-warning border-0 text-dark p-2 ic rounded mt-3" onclick="execCmd('indent');"><i class="fa fa-indent"></i></button>
					<button title="Outdent" class="bg-warning border-0 text-dark p-2 ic rounded" onclick="execCmd('outdent');"><i class="fa fa-dedent"></i></button>
					<button title="Sub script" class="bg-warning border-0 text-dark p-2 ic rounded" onclick="execCmd('subscript');"><i class="fa fa-subscript"></i></button>
					<button title="Super script" class="bg-warning border-0 text-dark p-2 ic rounded" onclick="execCmd('superscript');"><i class="fa fa-superscript"></i></button>
					<button title="paragraph" class="bg-warning border-0 text-dark p-2 ic rounded" onclick="execCmd('insertParagraph');"><i class="fa fa-paragraph"></i></button>
				
			</div>
			<div class="con col-3 bg-dark p-3 border border-info border-left-0 border-top-0 border-bottom-0">
				<div class="text-warning mb-3" >Tool</div>
				<button class="bg-warning border-0 text-dark p-2 ic rounded" onclick="execCmd('cut');"><i class="fa fa-cut"></i></button>
				<button class="bg-warning border-0 text-dark p-2 ic rounded" onclick="execCmd('copy');"><i class="fa fa-copy"></i></button>
				<button class="bg-warning border-0 text-dark p-2 ic rounded" onclick="execCmd('delete');"><i class="fa fa-trash"></i></button>
				<button class="bg-warning border-0 text-dark p-2 ic rounded" onclick="execCmd('undo');"><i class="fa fa-undo"></i></button>
				<button class="bg-warning border-0 text-dark p-2 ic rounded" onclick="execCmd('redo');"><i class="fa fa-repeat"></i></button>
				<br>
				<button class="bg-warning border-0 text-dark p-2 ic rounded mt-3" onclick="execCmd('insertUnorderedlist');"><i class="fa fa-list-ul"></i></button>
				<button class="bg-warning border-0 text-dark p-2 ic rounded" onclick="execCmd('insertorderedlist');"><i class="fa fa-list-ol"></i></button>
				<button class="bg-warning border-0 text-dark p-2 ic rounded" onclick="execCommandWithArg('createLink' , prompt('Enter Url','http://'));"><i class="fa fa-link"></i></button>
				<button class="bg-warning border-0 text-dark p-2 ic rounded" onclick="execCmd('unlink');"><i class="fa fa-unlink"></i></button>
				<button class="bg-warning border-0 text-dark p-2 ic rounded" onclick="toggleSrc();"><i class="fa fa-code"></i></button>
				
			</div>

			<div class="ccon col-3 bg-dark p-3 border border-info border-left-0 border-top-0 border-bottom-0">
				<div class="text-warning mb-3" >Color & insert</div>
				<span class="text-light ">ForColor <span> <input class="ic bg-warning border-0" type="color" name="forcolor"  onchange="execCommandWithArg('foreColor',this.value);">
				<span class="text-light ml-2">Backcolor<span> <input class="ic bg-warning border-0" type="color" name="Backcolor" onchange="execCommandWithArg('hiliteColor',this.value);">
					<br>
				<span>Image  </span><button class="imgIc bg-warning border-0 text-dark p-2 ic rounded mt-3" onclick="execCommandWithArg('insertImage',prompt('Enter Url image',''));"><i class="fa fa-file-image-o"></i></button>
				<span class="ml-3">SelecAll  </span> <button class="selAll bg-warning border-0 text-dark p-2 ic rounded mt-3" onclick="execCmd('selectAll');"><i class="fa fa-reply-all" aria-hidden="true"></i></button>
			</div>
		</div>


		<div class="row">
			<button class="btn btn-danger mt-1 " onclick="toggleEdit();"><i class="fa fa-lock"></i> Stop Edit</button>
		</div>

		
	</div>

	<div class="container bg-light border border-warning">
	
	<form  action="show.php" method="POST" id="tt">
		title 
		<input type="text" name="title_text">
		<textarea class="d-none" id="t" name="content"></textarea><br>
		<iframe name="rtf" id="test" style="width:1100px; height: 400px"></iframe>
		<button class="btn btn-dark p-2" onclick="s();"><i class="fa fa-save mr-2"></i>Save </button>
	</form>
	</div><br><br>
	<div class="container">
		<button class="btn btn-primary">Mahmoud Abdelfadeil</button><br><br>
	</div>
	
	
	<form method="POST" action="index.php" >
		<input type="file" name="img">
		<input type="submit" name="upload">
	</form>
	
	
	


	

	

	
	
	
	
	
	
	
	
	<script type="text/javascript">
		var showCode = false ;
		var edit     = true ; 
		function enableEditeMode (){
			rtf.document.designMode='on';
		}

		function execCmd(command){
			rtf.document.execCommand(command , false , null);
		}

		function execCommandWithArg(command , arg ){
			rtf.document.execCommand(command , false , arg);
		}

		function toggleSrc(){
			if (showCode) {
				rtf.document.getElementsByTagName('body')[0].innerHTML = rtf.document.getElementsByTagName('body')[0].textContent;
				showCode = false;
			}else{
				rtf.document.getElementsByTagName('body')[0].textContent = rtf.document.getElementsByTagName('body')[0].innerHTML;
				showCode = true;
			}
		}

		function toggleEdit() {
			if (edit) {
				rtf.document.designMode='off';
				edit = false ; 

				}else{
					rtf.document.designMode='on';
				edit = true ; 
			}
		}
		function s (){
			document.getElementById('t').value = window.frames['rtf'].document.body.innerHTML;

			document.getElementById('tt').submit();
		}


	</script>

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>