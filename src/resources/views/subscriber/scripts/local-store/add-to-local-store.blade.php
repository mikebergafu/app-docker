<script>
    var favs =
        {
            queue:
                [
                    {id: 0,itemId:"Banana", name:"Banana", type:"Category"},
                    {id: 1,itemId:"Orange", name:"Orange", type:"Category"},
                    {id: 2,itemId:"Apple",  name:"Apple", type:"Category"},
                    {id: 3,itemId:"Mango",  name:"Mango", type:"Category"}
                ]
        };

    localStorage.setItem('favs', JSON.stringify(favs));

    outputIt();

    function outputIt() {
        var restoredFavs = JSON.parse(localStorage.getItem('favs'));
        var outputs = "";
        for(var i = 0; i < restoredFavs.queue.length; i++)
        {
            outputs += '<div id="'+restoredFavs.queue[i].id + '">'
                + restoredFavs.queue[i].id+':'
                +restoredFavs.queue[i].name +
                ':'+restoredFavs.queue[i].type +
                '</div>';
        }
        document.getElementById("demo").innerHTML= outputs;
    }

    function popIt() {
        var restoredFavs  = JSON.parse(localStorage.getItem('favs'));
        restoredFavs.queue.shift();
        localStorage.setItem('favs', JSON.stringify(restoredFavs));
        outputIt();
    }

    function pushIt() {
        var restoredFavs = JSON.parse(localStorage.getItem('favs'));

        restoredFavs.queue.push({
            id:  Math.floor(Math.random() * (100 - 1 + 1)) + 1,
            itemId: $('#item_id').val(),
            itemName: $('#item_name').val(),
            itemType: $('#item_type').val()
        });

        localStorage.setItem('favs', JSON.stringify(restoredFavs));

        outputIt();
    }
</script>
