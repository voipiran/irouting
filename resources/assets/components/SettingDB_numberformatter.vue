<template>
  <div class="setting_ container-fluid">

    <notifications position="bottom left" :duration="5000" />


    <h3> تنظیمات</h3>
    <div class="row">
      <div class="col-12 mx-auto table-shadow ">
        <table class="mt-2">
          <thead>
            <tr>
              <th>توضیحات</th>
              <th>عملیات</th>
            </tr>
          </thead>
          <tbody>
            <!-- content -->
            <tr v-for="(td, index) in data" :key="index">
              <td>{{ td.descrioption }}</td>
              <td><Toggle :value="td.enable" @change="changeState(td);"/></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Toggle from "@vueform/toggle";

export default {
  components: { Toggle },
  data() {
    return {
      data: null,
      isLoading: false
    };
  },
  methods: {
    async getDate() {
      try {
        let result = await axios({
          method: "post",
          url: `${API}number-format`,
          data: {
            method: "getData",
          },
        });
        this.data = result.data.data.map((item) => {
          return {
            descrioption: item.descrioption,
            enable: item.enable == '1' ? true : false,
            name: item.name,
          }
        });
      } catch (error) {
        console.log(error);
      }
    },
    // submit toggle switch
    async changeState(row) {
      try {
        if (this.isLoading) return

        this.isLoading = true;
        await axios({
          method: "post",
          url: `${API}number-format`,
          data: {
            method: "update",
            data: row
          }
        });

        this.getDate();

        this.$notify({
          text: "عملیات با موفقیت انجام شد",
          type: 'success'
        });

      } catch (error) {
        console.log(error);
      }

      this.isLoading = false;
    }
  },
  async mounted() {
    this.getDate();
  },
};
</script>

<style lang="scss">

.setting_ {
 .table-shadow {
  box-shadow: 3px 12px 13px #b9b9b978;
  margin-top: 50px !important;
  padding: 20px;
  overflow: auto;
}
table {
  border-collapse: collapse !important;
  width: 100%;
  th,
  td {
    white-space: nowrap;
    text-align: center;
  }
  thead {
    background-color: #dfdfdf;
    th {
      padding: 10px;
    }
  }
  tbody {
    tr:nth-child(odd) {
      background-color: #f6f6f6;
    }
    tr:nth-child(even) {
      background-color: #ededed;
    }
    td {
      padding: 10px;
    }
  }
}
}
</style>
