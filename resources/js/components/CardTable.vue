<script>
export default {
    props : ['cards','status'],
    data (){
        return {
            import : false
        }
    },
name: "CardTable",
    methods : {
        toogleImport(){
            this.import = !this.import
        },
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
