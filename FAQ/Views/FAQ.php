<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>FAQ</title>


</head>

<body>
<?php require_once "../Assets/html/header.php"?>
<link rel="stylesheet" href="../../Assets/css/faq/FAQ.css">
	<div id="main" class="container">

		<h2>FAQ & Terms</h2>
		<div class="row">
			<div class="col-lg-8 col-sm-12 col-md-8">
				<div class="row menu">
					<ul class="nav nav-tabs menu-nav col-md-12 col-sm-12 col-xs-12 nav-style" role="tablist">
						<li role="presentation" class="active" id="">
							<a href="#content" id="showFAQ" aria-controls="content" role="tab" data-toggle="tab">FAQ</a>
						</li>
						<li role="presentation" class="" id="">
							<a href="#Terms" id="showTerms" aria-controls="Terms" role="tab" data-toggle="tab">Terms & Conditions</a>
						</li>
					</ul>

				</div>
				<div class="tab-content">
					<div id="content" role="tabpanel" class="tab-pane active">
						<div class="row">
							<div class="col-xs-4 col-sm-4">
								<form class="navbar-form" id="search-form">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Search" id="searchBox">
										<div class="input-group-btn">
											<button class="btn btn-default" type="button"><i class="glyphicon glyphicon-search"></i></button>
										</div>
									</div>
								</form>
							</div>

							<div class="col-sm-4 col-xs-12">

									<select name="select-option" class="form-select" id="question-list">
										<option value="allQuestion">ALL Question</option>
										<?php foreach($categorys as $category): ?>
										<option value="<?php echo $category->category?>"><?php echo $category->category?></option>
										<?php endforeach?>
									</select>

							</div>


							<div class="col-sm-4 col-xs-12">

									<select name="select-option" class="form-select" id="sort-by">
										<option value="id">Sort By</option>
										<option value="id">Question Number</option>
										<option value="frequency">Frequent Ask</option>
									</select>

							</div>


						</div>

						<div class="question-list">
							<?php $i=1?>
							<?php foreach($results as $result):?>

							<div class="row question" name="<?php echo $result->question_id?>">
								<div class="col-lg-12 no-padding"><span><?php echo $i?>.</span><?php echo $result->questions?></div>
							</div>

							<div class="row answer">
								<?php echo $result->answer?>
							</div>
							<?php $i++?>
							<?php endforeach?>

						</div>
					</div>
					<div id="Terms" role="tabpanel" class="tab-pane">
						<?php foreach($terms as $term):?>
								<h2><?php echo $term->title?></h2>
								<?php foreach($term->answer as $value):?>
									<p><?php echo $value?></p>
								<?php endforeach?>
					<?php endforeach?>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-sm-12 col-md-4">
				<h4 class="terms-head">Talk to us</h4>
				<div class="contact-us">
					<span class="circle"><a href=""><i class="glyphicon glyphicon-envelope envelope-size"></i>
						</a></span>

					<div class="contact-info">
						<h4 class="media-heading">Email</h4>
						<a href="mailto:concierge@pvrdirectorscut.com">concierge@pvrdirectorscut.com</a>
					</div>

				</div>
				
				<div class="booking-form">
          <h2>Message</h2>

          <form action="#" method="post" id="contactForm">
           				<input type="hidden" name="route" value="FAQ/SendEmail"/>
			  <div class="contactform">

							  <p class="form-group">
								  <label for="email"><b>Email:</b></label>
								  <input type="text" class="form-text" name="email" id="email" value="" class="required requiredField email full">
							  </p>

                                <p class="form-group">
                                    <label for="Title"><b>Title:</b></label>
                                    <input type="text" class="form-text" name="Title" id="Title" value="" class="required requiredField full">
                                </p>



                                <p class="form-group">
                                    <label for="comments"><b>Message:</b></label>
                                    <textarea name="comments" class="form-text" id="commentsText" rows="10"></textarea>
                                </p>
                               
                                
                            </div>
            

            <button type="submit" class="btn btn-default booking-btn">Send
              <img alt="arrow pic" class="btn-arrow" src="../../Assets/image/btn-arrow.png">
            </button>
          </form>
					<div id="errorMessage">
					<?php if(isset($error)):?>
					<?php echo $error?>
					<?php endif?>
					</div>
        </div>
			</div>
			

		</div>
	</div>

<?php require_once "../Assets/html/footer.php"?>


	<script src="../../Assets/js/faq/FAQ.js"></script>
</body>

</html>