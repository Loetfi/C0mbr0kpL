/*
 * All Admin Related Scripts in this Havnor Theme
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

jQuery(document).ready(function($) {
  "use strict";
  /*---------------------------------------------------------------*/
  /* =  Toggle Meta boxes based on post formats
  /*---------------------------------------------------------------*/
  function havnor_toggle_metaboxes() {

    // Hide All Format Metabox Fields
    function hide_all_format_metaboxes() {
      $('.cs-element-standard-image, #cs-tab-section_post_formats .cs-element-gallery-format, #cs-tab-section_post_formats .cs-element-add-gallery, .cs-element-audio-post, .cs-element-audio-iframe-code, .cs-element-video-post, .cs-element-video-iframe-code, .cs-element-video-link').hide();
    }
    // Show Only Image Format Metabox Fields
    function image_format_metaboxes() {
      $('#cs-tab-section_post_formats .cs-element-gallery-format, #cs-tab-section_post_formats .cs-element-add-gallery, .cs-element-audio-post, .cs-element-audio-iframe-code, .cs-element-video-post, .cs-element-video-iframe-code, .cs-element-video-link').slideUp('fast');
      $('.cs-element-standard-image').slideDown('slow');
    }
    // Show Only Gallery Format Metabox Fields
    function gallery_format_metaboxes() {
      $('.cs-element-standard-image, .cs-element-audio-post, .cs-element-audio-iframe-code, .cs-element-video-post, .cs-element-video-iframe-code, .cs-element-video-link').slideUp('fast');
      $('#cs-tab-section_post_formats .cs-element-gallery-format, #cs-tab-section_post_formats .cs-element-add-gallery').slideDown('slow');
    }
    // Show Only Audio Format Metabox Fields
    function audio_format_metaboxes() {
      $('.cs-element-standard-image, #cs-tab-section_post_formats .cs-element-gallery-format, #cs-tab-section_post_formats .cs-element-add-gallery, .cs-element-video-post, .cs-element-video-iframe-code, .cs-element-video-link').slideUp('fast');
      $('.cs-element-audio-post, .cs-element-audio-iframe-code').slideDown('slow');
    }
    // Show Only Video Format Metabox Fields
    function video_format_metaboxes() {
      $('.cs-element-standard-image, #cs-tab-section_post_formats .cs-element-gallery-format, #cs-tab-section_post_formats .cs-element-add-gallery, .cs-element-audio-post, .cs-element-audio-iframe-code').slideUp('fast');
      $('.cs-element-video-post, .cs-element-video-iframe-code, .cs-element-video-link').slideDown('slow');
    }

    function getMetaFieldsWork() {
      if (postFormat == 'standard') {image_format_metaboxes();}
      if (postFormat == 'image') {image_format_metaboxes();}
      if (postFormat == 'gallery') {gallery_format_metaboxes();}
      if (postFormat == 'audio') {audio_format_metaboxes();}
      if (postFormat == 'video') {video_format_metaboxes();}
    }

    hide_all_format_metaboxes();
    let postFormat;
    if ($('div').hasClass("block-editor")) {
      wp.data.subscribe( () => {
        const newPostFormat = wp.data.select( 'core/editor' ).getEditedPostAttribute( 'format' );
        if ( postFormat !== newPostFormat ) {
          postFormat = newPostFormat;
        }
        getMetaFieldsWork(); // On Change Page Effect
      } );
    } // If hasClass of block-editor

    // Saved Value Effect
    getMetaFieldsWork();

    // Classic Editor
    if (!$('body').hasClass('.block-editor-page')) { // If Condition for Classic Editor
      var format = $("input[name='post_format']:checked").val();
      $('.cs-element-standard-image, #cs-tab-section_post_formats .cs-element-gallery-format, #cs-tab-section_post_formats .cs-element-add-gallery, .cs-element-audio-post, .cs-element-audio-iframe-code, .cs-element-video-post, .cs-element-video-iframe-code, .cs-element-video-link').hide();
      if (format == '0' || format == 'image') {
        $('').slideUp('fast');
        $('.cs-element-standard-image').slideDown('slow');
      }
      if (format == 'gallery') {
        $('').slideUp('fast');
        $('#cs-tab-section_post_formats .cs-element-gallery-format, #cs-tab-section_post_formats .cs-element-add-gallery').slideDown('slow');
      }
      if (format == 'audio') {
        $('').slideUp('fast');
        $('.cs-element-audio-post, .cs-element-audio-iframe-code').slideDown('slow');
      }
      if (format == 'video') {
        $('').slideUp('fast');
        $('.cs-element-video-post, .cs-element-video-iframe-code, .cs-element-video-link').slideDown('slow');
      }

    } // If Condition for Classic Editor
  }

  havnor_toggle_metaboxes(); // Execute on document ready

  if (!$('body').hasClass('.block-editor-page')) {
    $('#post-formats-select input[type="radio"]').on('click', function() { havnor_toggle_metaboxes(); });
  }

  $( ".vt-cs-widget-fields" ).parents( ".widget-inside" ).addClass( "vt-cs-widget" );

});