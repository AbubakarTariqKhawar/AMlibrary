<template>
    <div class="container">
        <label class="mt-3" style="font-size: 25px; ">
            <b>Categories:</b>
            <div class="categoriesS">
                <select style="margin-top: 2px; float: left;" class="form-select  cartselect arder" name="arder">
                <option value="allc">All Categories</option>
                <option value="desc">Horror</option>
                </select>
                <div class=" rounded rounded-pill searchabu">
                    <div class="input-group">
                    <input type="search" placeholder="What're you searching for?" aria-describedby="button-addon1" class="form-control border-0 bg-light" style="color: white !important;">
                    <div class="input-group-append">
                        <button id="button-addon1" type="submit" class="btn btn-link "><i class="fa fa-search"></i></button>
                    </div>
                    </div>
                </div>

            </div>

        </label>
        <label>



        </label>


    </div>

</template>

<script>
export default {
    name: "EditPost"
}
</script>

<style scoped>

</style>
