<script>
export default {
    props : ['cards','status'],
name: "CardTable",
    methods : {
        updateStatus(status, item){
            axios.put(item.update_url, item).then((res)=> {
                console.log(res.data);
                toastr.success('Card Status successfully updated')
            })
        }
    }
}
</script>

<style scoped>

</style>
