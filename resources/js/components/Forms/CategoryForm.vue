<template>
    <form>
        <div class="text-center">
            <h2>New Category</h2>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</template>
<script>
export default {
    name: 'CategoryForm',
    setup() {
        
    },
}
</script>