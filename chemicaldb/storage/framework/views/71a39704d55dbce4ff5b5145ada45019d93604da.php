<script>
window.LaravelSurvivor = {
    token: '<?php echo e($token); ?>',
    interval: setInterval(function() {
        var e=window.XMLHttpRequest?new XMLHttpRequest:new ActiveXObject('Microsoft.XMLHTTP');
        e.onreadystatechange = function() { if (e.readyState == XMLHttpRequest.DONE && e.responseText) {
        var response = JSON.parse(e.responseText);
        if (response && response._token) {
            window.LaravelSurvivor.token = response._token;
            var meta   = document.querySelectorAll('meta[name=csrf-token]');
            var inputs = document.querySelectorAll('<?php echo e($input_elements); ?>');

            if (meta) {
                meta[0].setAttribute("content", response._token);
            }

            if (inputs) {
                for (i = 0; i < inputs.length; i++) {
                    inputs[i].value = response._token;
                }
            }
        }}};
        e.open('GET','<?php echo e($url); ?>',!0);
        e.setRequestHeader('X-Requested-With','XMLHttpRequest');
        e.setRequestHeader('X-CSRF-TOKEN', window.LaravelSurvivor.token);
        e.send();
    }, <?php echo e($interval); ?>)
};
</script>
<?php /**PATH D:\xampp\htdocs\zonkargo\vendor\influendo\laravel-survivor\src/../views/script.blade.php ENDPATH**/ ?>