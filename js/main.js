// var connection = window.navigator.connection || window.navigator.mozConnection || window.navigator.webkitConnection;
// var type = connection ? connection.type : false;
//
// alert( type );
//
// //only run scripts if user is connected to wifi or not on a phone
// if( !type || type === 'wifi'){
  $(document).ready( function(){

    // we haven't established a breakpoint
    var breakpoint = false;

    /* return the current breakpoint
     */
    var getBreakpoint = function(){
      if( $(window).width() >= 1200 ) return 'lg';
      if( $(window).width() >= 992 )  return 'md';
      if( $(window).width() >= 768 )  return 'sm';
      return 'xs';
    }

    /* set the Background image of a target
     * target: jQuery-wrapped object
     * url: url of background image
     */
    var setRespBg = function( target, url ){
      // load image in js first, so it's ready when we add it
      var image = new Image();
      image.onload = function(){
        target.css( 'background-image', 'url('+url+')' ).addClass( 'respBg--loaded');
      };
      image.src = url;
    }

    // wrap our code so that we can re-run it on window resize
    var respBg = function(){
      // only run if we haven't established breakpoint or the breakpoint has changed
      if( !breakpoint || getBreakpoint() !== breakpoint ){
        // establish breakpoint
        breakpoint = getBreakpoint();

        $( '.js-respBg' ).each( function(){
          var _this = $(this);
          var id  = _this.attr( 'data-id' );
          var set = _this.attr( 'data-set' );
          $.get( '/wp-json/v1/single/'+id+'/'+set+'/'+getBreakpoint(), function( data ){
            setRespBg( _this, data );
          } );
        } );

        $( '.js-respBg--rand' ).each( function(){
          var _this = $(this);
          var id  = _this.attr( 'data-id' );
          var set = _this.attr( 'data-set' );
          $.get( '/wp-json/v1/random/'+id+'/'+set+'/'+getBreakpoint(), function( data ){
            setRespBg( _this, data );
          } );
        } );

      }
    }

    respBg();
    $(window).resize( respBg );

    // default time to day
    // wrap code so we can re-run it when light changes
    var time = 'day';
    var dayNite = function( time ){
      $( '.js-respBg--dayNite' ).each( function(){
        var _this = $(this);
        var id =  _this.attr( 'data-id' );
        var set = _this.attr( 'data-set' );
        $.get( '/wp-json/v1/daynite/'+id+'/'+time+'/'+set+'/'+getBreakpoint(), function( data ){
          setRespBg( _this, data );
        } );
      } );
    }

    dayNite( time );

    // when light changes, call dayNight and update time
    window.addEventListener( 'devicelight', function(e) {
      console.log( e.value );
      var _time = e.value < 50 ? 'nite' : 'day';
      if( _time !== time ){
        dayNite( _time );
        time = _time;
      }
    } );

  } );
// } else {
//   alert( 'Certain site functionality has been limited because you are not connected to Wifi.' );
// }
