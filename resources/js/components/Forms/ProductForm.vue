<template>
    <form>
        <div class="text-center">
            <h2>New Product</h2>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputCity">Title</label>
            <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="form-group col-md-6">
                <label for="inputState">State</label>
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
            <div class="form-group col-md-12">
                <label for="exampleFormControlTextarea1">Example textarea</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</template>
<script>
export default {
    name: 'ProductForm',
    setup() {
        
    },
}
</script>
