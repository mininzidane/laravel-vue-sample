<script setup>
import { reactive, ref } from 'vue';

const searchForm = reactive({
    name: '',
    bedrooms: '',
    bathrooms: '',
    storeys: '',
    garages: '',
    priceFrom: '',
    priceTo: '',
});

const loading = ref(false);
const searchData = ref([]);

const onSubmit = async () => {
    loading.value = true;
    try {
        const response = await window.axios.get('/api/search', {
            params: {
                name: searchForm.name,
                bedrooms: searchForm.bedrooms,
                bathrooms: searchForm.bathrooms,
                storeys: searchForm.storeys,
                garages: searchForm.garages,
                priceFrom: searchForm.priceFrom,
                priceTo: searchForm.priceTo,
            }
        });
        searchData.value = response.data.data;
    } catch (e) {
        alert(e);
    } finally {
        loading.value = false;
    }
}

const clear = () => {
    searchForm.name = '';
    searchForm.bedrooms = '';
    searchForm.bathrooms = '';
    searchForm.storeys = '';
    searchForm.garages = '';
    searchForm.priceFrom = '';
    searchForm.priceTo = '';
}

</script>

<template>
    <div class="common-layout">
        <el-container>
            <el-header><h1>Search property</h1></el-header>
            <el-main>
                <el-form :inline="true" :model="searchForm" class="form-inline">
                    <el-row>
                        <el-col :span="6">
                            <el-form-item label="Name">
                                <el-input v-model="searchForm.name" clearable/>
                            </el-form-item>
                            <el-form-item label="Garages">
                                <el-input type="number" min="0" v-model="searchForm.garages"/>
                            </el-form-item>
                        </el-col>
                        <el-col :span="6">
                            <el-form-item label="Bedrooms">
                                <el-input type="number" min="0" v-model="searchForm.bedrooms"/>
                            </el-form-item>
                            <el-form-item label="Price From">
                                <el-input type="number" min="0" v-model="searchForm.priceFrom"/>
                            </el-form-item>
                        </el-col>
                        <el-col :span="6">
                            <el-form-item label="Bathrooms">
                                <el-input type="number" min="0" v-model="searchForm.bathrooms"/>
                            </el-form-item>
                            <el-form-item label="Price To">
                                <el-input type="number" min="0" v-model="searchForm.priceTo"/>
                            </el-form-item>
                        </el-col>
                        <el-col :span="6">
                            <el-form-item label="Storeys">
                                <el-input type="number" min="0" v-model="searchForm.storeys"/>
                            </el-form-item>
                            <el-form-item>
                                <el-button type="primary" @click="onSubmit">Search</el-button>
                                <el-button type="danger" @click="clear">Clear</el-button>
                            </el-form-item>
                        </el-col>
                    </el-row>
                </el-form>

                <el-table :data="searchData" stripe style="width: 100%" v-loading="loading">
                    <el-table-column prop="name" label="Name"/>
                    <el-table-column prop="bedrooms" label="Bedrooms" width="100"/>
                    <el-table-column prop="bathrooms" label="Bathrooms" width="100"/>
                    <el-table-column prop="storeys" label="Storeys" width="100"/>
                    <el-table-column prop="garages" label="Garages" width="100"/>
                    <el-table-column prop="price" label="Price" width="200"/>
                </el-table>
            </el-main>
        </el-container>
    </div>
</template>

<style scoped>
    .common-layout {
        max-width: 1024px;
        margin: 0 auto;
        padding-top: 15px;
    }
    .form-inline {
        margin-bottom: 1em;
    }
</style>
