<script>
    /**
     * author Remy Sharp
     * url http://remysharp.com/2009/01/26/element-in-view-event-plugin/
     */
    $.fn.inView = function(){
        if(!this.length) return false;
        var rect = this.get(0).getBoundingClientRect();

        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );

    };

    //additional examples for other use cases
    //true false whether an array of elements are all in view
    $.fn.allInView = function(){
        var all = [];
        this.forEach(function(){
            all.push( $(this).inView() );
        });
        return all.indexOf(false) === -1;
    };

    //only the class elements in view
    $('.some-class').filter(function(){
        return $(this).inView();
    });

    //only the class elements not in view
    $('.some-class').filter(function(){
        return !$(this).inView();
    });



    // The checker
    const gambitGalleryIsInView = el => {

        const scroll = window.scrollY || window.pageYOffset;
        const boundsTop = el.getBoundingClientRect().top + scroll

        const viewport = {
            top: scroll,
            bottom: scroll + window.innerHeight,
        };

        const bounds = {
            top: boundsTop,
            bottom: boundsTop + el.clientHeight,
        };

        return ( bounds.bottom >= viewport.top && bounds.bottom <= viewport.bottom )
            || ( bounds.top <= viewport.bottom && bounds.top >= viewport.top );
    };


    // Usage.
    document.addEventListener( 'DOMContentLoaded', () => {
        const tester = document.querySelector( 'tester' );
        const answer = document.querySelector( '.answer' );

        const handler = () => raf( () => {
            ( gambitGalleryIsInView( tester ) ?
                my_act() :
                do_nothing() )

        } );

        handler();
        window.addEventListener( 'scroll', handler )
    } );

    // requestAnimationFrame
    const raf =
        window.requestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        function( callback ) {
            window.setTimeout( callback, 1000 / 60 )
        }

</script>
