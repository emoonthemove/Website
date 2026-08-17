<li class="edgtf-tweet-item">
	<div class="edgtf-tweet-info-holder">
		<div class="edgtf-tweet-img">
			<a target="_blank" href="<?php echo esc_url($tweet_url); ?>">
				<img src="<?php echo esc_url($tweeter_img);?>" alt=""/>
			</a>
		</div>
		<div class="edgtf-tweet-info">
			<h5 class="edgtf-tweeter-name"><?php echo esc_html($tweeter_name); ?></h5>
			<span class="edgtf-tweeter-username">
				<span><?php echo esc_html($tweeter_username); ?></span>
				<span><?php echo wp_kses_post($tweet_time); ?></span>
			</span>
		</div>
	</div>
	<div class="edgtf-tweet-text">
		<?php echo wp_kses_post($tweet_text); ?>
	</div>
</li>