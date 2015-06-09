<?php $lang = CakeSession::read('lang'); ?>
<style>#map-canvas {
        height: 400px;
        margin: 0px;
        padding: 0px
      }</style>
<div class="contact">
		<div class="container">
			<div class="services">
				<h3><?php echo Message::label('contact_us'); ?></h3>
			</div>
			<div class="map">
				<h4><?php echo Message::label('map_guide'); ?></h4>
				<div id="map-canvas"></div>	
			</div>
			
			<div class="contact-infom">
				<h4><?php echo Message::label('contact_info'); ?></h4>
				<p>
					<?php echo nl2br($set['contact_info_'.$lang]) ?>
				</p>
			</div>	
			<div class="address">
				<div class="address-left">
					<h4><?php echo Message::label('address'); ?> 1 :</h4>
					<p><?php echo $set['address_1_'.$lang]; ?></p>
					<p><?php echo Message::label('tel'); ?> : <?php echo $set['tel_1'] ?></p>
					<p>FAX : <?php echo $set['fax_1'] ?></p>
					<p>Email : <a href="mailto:<?php echo $set['email'] ?>"><?php echo $set['email'] ?></a></p>
				</div>
				<div class="address-left">
					<h4><?php echo Message::label('address'); ?> 2 :</h4>
					<p><?php echo $set['address_2_'.$lang]; ?></p>
					<p><?php echo Message::label('tel'); ?> : <?php echo $set['tel_1'] ?></p>
					<p>FAX : <?php echo $set['fax_2'] ?></p>
					<p>Email : <a href="mailto<?php echo $set['email'] ?>"><?php echo $set['email'] ?></a></p>
				</div>	
				<div class="clearfix"> </div>
			</div>
			<div class="contact-form">
				<h4><?php echo Message::label('contact_us'); ?></h4>
				<h5><?php echo $this->Session->flash(); ?></h5>
				<form method="post">
					<input type="text" <?php if(@$this->validationErrors['Contact']['name']) echo 'class="error"'; ?> name="name" value="<?php echo @$params['name']; ?>" placeholder="<?php echo Message::label('name'); ?>" >
					<input type="email" <?php if(@$this->validationErrors['Contact']['email']) echo 'class="error"'; ?> name="email" value="<?php echo @$params['email']; ?>" placeholder="Email" >
					<input type="text" <?php if(@$this->validationErrors['Contact']['tel']) echo 'class="error"'; ?> name="tel" value="<?php echo @$params['tel']; ?>" placeholder="<?php echo Message::label('tel'); ?>">
					<textarea type="text"  <?php if(@$this->validationErrors['Contact']['content']) echo 'class="error"'; ?> name="content"  placeholder="<?php echo Message::label('message'); ?>"><?php echo @$params['content']; ?></textarea>
					<input type="submit" value="<?php echo Message::label('submit'); ?>" >
				</form>
			</div>
			
		</div>
	</div>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
	<script type="text/javascript">
                    var latitude = "<?php echo $set['map_lat'] ?>";
                    var longtitude = "<?php echo $set['map_long'] ?>";
                    var map = null;

                    function initialize() {
                        var myLatlng = new google.maps.LatLng(latitude, longtitude);
						  var mapOptions = {
						    zoom: 16,
						    center: myLatlng
						  }
						  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

						  var marker = new google.maps.Marker({
						      position: myLatlng,
						      map: map,
						      title: "<?php echo site_name ?>"
						  });
                    }
                    google.maps.event.addDomListener(window, 'load', initialize);
	</script>