<script>
    if(!localStorage.getItem('color')){
        localStorage.setItem('color', 'color-1');
        localStorage.setItem('secondary', '#ba895d');
        localStorage.setItem('primary', '#24695c');
        document.location.reload();
    }
</script>