<template>
  <div class="app-container">
    <div class="filter-container">
      <el-button class="filter-item" type="primary" icon="el-icon-plus" @click="handleCreateForm">
        {{ $t('table.add') }}
      </el-button>
    </div>
    <el-table v-loading="loading" :data="list" border fit highlight-current-row>
      <el-table-column align="center" label="ID" width="60">
        <template slot-scope="scope">
          <span>{{ scope.row.id }}</span>
        </template>
      </el-table-column>

      <el-table-column align="center" label="Proveedor" width="150">
        <template slot-scope="scope">
          <span>{{ scope.row.proveedor }}</span>
        </template>
      </el-table-column>

      <el-table-column align="center" label="Marca" width="100">
        <template slot-scope="scope">
          <span>{{ scope.row.marca }}</span>
        </template>
      </el-table-column>

      <el-table-column align="center" label="Contacto" width="170">
        <template slot-scope="scope">
          <span>{{ scope.row.contacto }}</span>
        </template>
      </el-table-column>

      <el-table-column align="center" label="Telefono" width="150">
        <template slot-scope="scope">
          <span>{{ scope.row.telefono }}</span>
        </template>
      </el-table-column>

      <el-table-column align="center" label="Email" width="100">
        <template slot-scope="scope">
          <span>{{ scope.row.email }}</span>
        </template>
      </el-table-column>

      <el-table-column align="center" label="Pais" width="80">
        <template slot-scope="scope">
          <span>{{ scope.row.pais }}</span>
        </template>
      </el-table-column>

      <el-table-column align="center" label="Direccion" width="200">
        <template slot-scope="scope">
          <span>{{ scope.row.direccion }}</span>
        </template>
      </el-table-column>

      <el-table-column align="center" label="Calidad" width="70">
        <template slot-scope="scope">
          <span>{{ scope.row.calidad }}</span>
        </template>
      </el-table-column>

      <el-table-column align="center" label="Pedidos">
        <template slot-scope="scope">
          <span>{{ scope.row.pedidos }}</span>
        </template>
      </el-table-column>

      <el-table-column align="center" label="Actions" width="350">
        <template slot-scope="scope">
          <el-button type="primary" size="small" icon="el-icon-edit" @click="handleEditForm(scope.row.id);">
            Edit
          </el-button>
          <el-button type="danger" size="small" icon="el-icon-delete" @click="handleDelete(scope.row.id, scope.row.proveedor);">
            Delete
          </el-button>
        </template>
      </el-table-column>
    </el-table>
    <hr style="margin:30px 0;" />
    <div>
      <template v-for="supplier in list">
        <div :key="supplier.id" style="margin-top:10px;">
            <a :href="supplier.link" v-if="supplier.link" target="_blank">{{ supplier.link }}</a>
        </div>
      </template>
    </div>
    <el-dialog :title="formTitle" :visible.sync="supplierFormVisible">
      <div class="form-container">
        <el-form ref="supplierForm" :model="currentSupplier" label-position="left" label-width="150px" style="max-width: 500px;" method="POST">
          <el-form-item label="Proveedor" prop="proveedor">
            <el-input v-model="currentSupplier.proveedor" required />
          </el-form-item>
          <el-form-item label="Marca" prop="marca">
            <el-input v-model="currentSupplier.marca" required />
          </el-form-item>
          <el-form-item label="Contacto" prop="contacto">
            <el-input v-model="currentSupplier.contacto" required />
          </el-form-item>
          <el-form-item label="Telefono" prop="telefono">
            <el-input v-model="currentSupplier.telefono" type="number" required />
          </el-form-item>
          <el-form-item label="Email" prop="email">
            <el-input v-model="currentSupplier.email" type="email" required />
          </el-form-item>
          <el-form-item label="Pais" prop="pais">
            <el-input v-model="currentSupplier.pais" required />
          </el-form-item>
          <el-form-item label="Direccion" prop="direccion">
            <el-input v-model="currentSupplier.direccion" required />
          </el-form-item>
          <el-form-item label="Calidad" prop="calidad">
            <el-input v-model="currentSupplier.calidad" required />
          </el-form-item>
          <el-form-item label="Pedidos" prop="pedidos">
            <el-input v-model="currentSupplier.pedidos" required />
          </el-form-item>
          <el-form-item label="External Link" prop="link">
            <el-input v-model="currentSupplier.link" required />
          </el-form-item>
        </el-form>
        <div slot="footer" class="dialog-footer">
          <el-button @click="supplierFormVisible = false">
            Cancel
          </el-button>
          <el-button type="primary" @click="handleSubmit()">
            Confirm
          </el-button>
        </div>
      </div>
    </el-dialog>
  </div>
</template>

<script>
import Resource from '@/api/resource';
const supplierResource = new Resource('suppliers');
export default {
  name: 'SuppliersList',
  data() {
    return {
      list: [],
      loading: true,
      options: null,
      supplierFormVisible: false,
      currentSupplier: {},
      formTitle: '',
    };
  },
  created() {
    this.getList();
  },
  methods: {
    async getList() {
      this.loading = true;
      let brand = '';
      if (this.$route.query.brand) {
        brand = this.$route.query.brand;
      }
      const { data } = await supplierResource.list({ 'brand': brand });
      this.list = data;
      this.loading = false;
    },
    handleSubmit() {
      if (this.currentSupplier.id !== undefined) {
        supplierResource.update(this.currentSupplier.id, this.currentSupplier).then(response => {
          this.$message({
            type: 'success',
            message: 'Supplier info has been updated successfully',
            duration: 5 * 1000,
          });
          this.getList();
        }).catch(error => {
          console.log(error);
        }).finally(() => {
          this.supplierFormVisible = false;
        });
      } else {
        supplierResource
          .store(this.currentSupplier)
          .then(response => {
            this.$message({
              message: 'New Supplier ' + this.currentSupplier.proveedor + ' has been created successfully.',
              type: 'success',
              duration: 5 * 1000,
            });
            this.currentSupplier = {
              id: '',
              proveedor: '',
              marca: '',
              contacto: '',
              telefono: '',
              email: '',
              pais: '',
              direccion: '',
              calidad: '',
              pedidos: '',
              link: '',
            };
            this.supplierFormVisible = false;
            this.getList();
          })
          .catch(error => {
            console.log(error);
          });
      }
    },
    handleCreateForm() {
      this.supplierFormVisible = true;
      this.formTitle = 'Create new supplier';
      this.currentSupplier = {
        proveedor: '',
        marca: '',
        contacto: '',
        telefono: '',
        email: '',
        pais: '',
        direccion: '',
        calidad: '',
        pedidos: '',
        link: '',
      };
    },
    handleDelete(id, supplier) {
      this.$confirm('This will permanently delete supplier ' + name + '. Continue?', 'Warning', {
        confirmButtonText: 'OK',
        cancelButtonText: 'Cancel',
        type: 'warning',
      }).then(() => {
        supplierResource.destroy(id).then(response => {
          this.$message({
            type: 'success',
            message: 'Delete completed',
          });
          this.getList();
        }).catch(error => {
          console.log(error);
        });
      }).catch(() => {
        this.$message({
          type: 'info',
          message: 'Delete canceled',
        });
      });
    },
    handleEditForm(id) {
      this.formTitle = 'Edit supplier';
      this.currentSupplier = this.list.find(supplier => supplier.id === id);
      this.supplierFormVisible = true;
    },
  },
};
</script>
