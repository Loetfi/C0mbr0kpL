<?php
$search_style_type = cs_get_option('search_type');
?>
<div class="search-link">
  <a href="javascript:void(0);"><i class="fa fa-search" aria-hidden="true"></i></a>  
  <div class="search-box">
    <form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" class="searchform" >
      <p>
        <input type="text" name="s" id="s" placeholder="<?php esc_attr_e('Search for...','havnor'); ?>" />
        <input type="submit" id="searchsubmit" class="submit-one hover-one" value="&#xf002;" />
        <?php if($search_style_type === 'post_type_search'){ ?>
        <input type="hidden" name="post_type" value="">
        <?php } ?>
      </p>
    </form>
  </div>
</div>
<?php
