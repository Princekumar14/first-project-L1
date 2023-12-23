@php
    $user = "prince";
    $fruits = ['apple', 'mango', 'grapes', 'banana']
@endphp

<script>
    // var data = @json($fruits);

    var data = {{ Js::from($fruits) }};
    

    data.forEach(function(enrty){
        console.log(enrty);
        
    });

</script>