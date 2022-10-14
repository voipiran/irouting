<template>
  <div class="table-shadow mt-0">
    <notifications position="bottom left" :duration="5000" />

    <!-- title -->
    <div class="mb-5">
      <h4>ویرایش {{ dataSetting ? dataSetting.route_name_title : '' }}</h4>
      <span class="p-2">{{ dataSetting ? dataSetting.route_desc : '' }}</span>
    </div>

    <!-- content -->
    <div class="row">
      <div class="col-12 mx-auto">
        <form action="" class="rounded">
          <div class="d-flex px-5">
            <label class="mx-3">وضعیت </label>
            <Toggle v-model="statusSwitch" />
          </div>
          <div
            class="timeFilter row mb-3"
            :class="{
              'loading-Calc-Date': loadingCalcDate,
              pointer_event: !statusSwitch
            }"
          >
            <div class="col-12">
              <h5></h5>
              <hr />
              <ul style="overflow: auto" class="">
                <li
                  :class="{ active: timeFilter == '1' }"
                  @click="
                    timeFilter = '1';
                    this.selectTime = false;
                    setTimeDatePicker();
                  "
                >
                  روز جاری
                </li>
                <li
                  :class="{ active: timeFilter == '2' }"
                  @click="
                    timeFilter = '2';
                    this.selectTime = false;
                    setTimeDatePicker();
                  "
                >
                  دیروز
                </li>
                <li
                  :class="{ active: timeFilter == '7' }"
                  @click="
                    timeFilter = '7';
                    this.selectTime = false;
                    setTimeDatePicker();
                  "
                >
                  یک هفته
                </li>
                <li
                  :class="{ active: timeFilter == '31' }"
                  @click="
                    timeFilter = '31';
                    this.selectTime = false;
                    setTimeDatePicker();
                  "
                >
                  یک ماه
                </li>
                <li
                  :class="{ active: timeFilter == '365' }"
                  @click="
                    timeFilter = '365';
                    this.selectTime = false;
                    setTimeDatePicker();
                  "
                >
                  یک سال
                </li>
                <li
                  :class="{ active: timeFilter == '9999' }"
                  @click="
                    timeFilter = '9999';
                    this.selectTime = true;
                    setTimeDatePicker();
                  "
                >
                  بدون محدودیت
                </li>
              </ul>
            </div>
            <div class="col-12 date-holder" v-if="timeFilter == '9999'">
              <label for="">لطفا روز مورد نظرتان را وارد نمایید </label>
              <vue-number-input v-model="getDay" controls max="999999999" min="0"></vue-number-input>
            </div>
          </div>
          <div class="d-flex mb-3">
            <label class="mx-3">بیان شماره کارشناس</label>
            <Toggle v-model="toggleSwitch" />
          </div>
          <div class="d-flex flex-column flex-md-row mt-5">
            <div class="col-12 col-md-4 mb-5">
              <div :class="{ pointer_event: toggleSwitch }">
                <label class="mx-3">فایل صوتی 1</label>
                <file-pond v-bind:files="promp1" :acceptedFileTypes="acceptedFileTypes" name="promp1" ref="promp1" label-idle="فایل مورد نظر را انتخاب کنید" v-bind:allow-multiple="false" :store-as-files="true" />
              </div>
              <div :key="keyUpdateAudioPlayer">
                <AudioPlayer v-model="audio1" :option="optionAudioPlayer1" />
              </div>
              <div class="d-flex justify-content-center">
                <button @click.prevent="resetfunc(1)" class="btn btn-warning mt-3">تنظیمات اولیه</button>
              </div>
            </div>

            <div class="col-12 col-md-4 mb-5">
              <div :class="{ pointer_event: !toggleSwitch }">
                <label class="mx-3">فایل صوتی 2a</label>
                <file-pond v-bind:files="promp2" :accepted-file-types="acceptedFileTypes" name="promp2" ref="promp2" label-idle="فایل مورد نظر را انتخاب کنید" v-bind:allow-multiple="false" :store-as-files="true" />
              </div>
              <div :key="keyUpdateAudioPlayer">
                <AudioPlayer v-model="audio2" :option="optionAudioPlayer2" />
              </div>
              <div class="d-flex justify-content-center">
                <button @click.prevent="resetfunc(2)" class="btn btn-warning mt-3">تنظیمات اولیه</button>
              </div>
            </div>
            <div class="col-12 col-md-4 mb-5">
              <div :class="{ pointer_event: !toggleSwitch }">
                <label class="mx-3">فایل صوتی 2b</label>
                <file-pond v-bind:files="promp3" :accepted-file-types="acceptedFileTypes" name="promp3" ref="promp3" label-idle="فایل مورد نظر را انتخاب کنید" v-bind:allow-multiple="false" :store-as-files="true" />
              </div>
              <div :key="keyUpdateAudioPlayer">
                <AudioPlayer v-model="audio3" :option="optionAudioPlayer3" />
              </div>
              <div class="d-flex justify-content-center">
                <button @click.prevent="resetfunc(3)" class="btn btn-warning mt-3">تنظیمات اولیه</button>
              </div>
            </div>
          </div>
          <div class="d-flex flex-column flex-md-row">
            <div class="col-12 col-md-4 mb-5 mb-md-0" dir="rtl">
              <label class="mx-3">عدد قبول درخواست</label>
              <Multiselect v-model="numberAccept" :options="options" />
            </div>
            <div class="col-12 col-md-4 mb-5 mb-md-0" dir="rtl">
              <label class="mx-3">اولویت</label>
              <Multiselect v-model="numbers" :options="numberArray" />
            </div>
            <div class="col-12 col-md-4 date-holder mb-3 mb-md-4">
              <label class="mx-3">پیش شماره کارشناس</label>
              <vue-number-input v-model="chooseNumber" controls max="999999999" min="0"></vue-number-input>
            </div>
          </div>
          <div class="mb-3 mb-md-0 d-flex">
            <button @click.prevent="submit()" class="btn btn-warning mx-2">ویرایش</button>
            <button class="btn btn-warning btn-back" @click="$router.push({ path: '/settings' })">بازگشت</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Toggle from "@vueform/toggle";
import Multiselect from "@vueform/multiselect";
import VueNumberInput from "@chenfengyuan/vue-number-input";
import vueFilePond from "vue-filepond";
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import AudioPlayer from "vue3-audio-player";
import "vue3-audio-player/dist/style.css";
const FilePond = vueFilePond(
  FilePondPluginFileValidateType,
  FilePondPluginImagePreview
);

export default {
  components: { Toggle, Multiselect, VueNumberInput, FilePond, AudioPlayer },
  data() {
    return {
      dataSetting: [],
      selectTime: false,
      toggleSwitch: false,
      statusSwitch: false,
      timeFilter: 0,
      loadingCalcDate: null,
      promp1: null,
      promp2: null,
      promp3: null,
      getDay: null,
      toggleSelected: null,
      valueOfNumber: null,
      value: null,
      numbers: null,
      chooseNumber: null,
      numberAccept: null,
      options: [
        "0",
        "1",
        "2",
        "3",
        "4",
        "5",
        "6",
        "7",
        "8",
        "9",
        "#",
        "*",
        "منتظر بمانید",
      ],
      numberArray: ["10", "20", "30", "40", "50", "60", "70", "80", "90"],
      optionAudioPlayer1: { src: null },
      optionAudioPlayer2: { src: null },
      optionAudioPlayer3: { src: null },
      keyUpdateAudioPlayer: 0,

      acceptedFileTypes: [
        "audio/*",
      ]
    };
  },
  methods: {
    /** get data when load page*/
    async getData() {
      try {
        let result = await axios({
          method: "post",
          url: `${API}/settings/action`,
          data: {
            method: "getSetting",
            id: this.$route.params.id,
          },
        });
        this.dataSetting = result.data.data;
        this.dataSetting.play_agent_num == "1"
          ? (this.toggleSwitch = true)
          : (this.toggleSwitch = false);
        this.dataSetting.enable == "1"
          ? (this.statusSwitch = true)
          : (this.statusSwitch = false);
        this.numberAccept =
          this.dataSetting.accept_digit == "d"
            ? "منتظر بمانید"
            : this.dataSetting.accept_digit;
        this.chooseNumber = this.dataSetting.agent_num_prefix;
        this.numbers = this.dataSetting.priority;
        this.timeFilter = this.dataSetting.timespan;

        this.setTimeDatePicker();

        this.optionAudioPlayer1.src = `${API}storage/${this.dataSetting.prompt1}?v=${this.keyUpdateAudioPlayer}`;
        this.optionAudioPlayer2.src = `${API}storage/${this.dataSetting.prompt2}?v=${this.keyUpdateAudioPlayer}`;
        this.optionAudioPlayer3.src = `${API}storage/${this.dataSetting.prompt3}?v=${this.keyUpdateAudioPlayer}`;
        this.keyUpdateAudioPlayer++;
      } catch (error) {
        console.log(error);
      }
    },

    async resetfunc(audio) {
      try {
        await axios({
          method: "post",
          url: `${API}/settings/action`,
          data: {
            method: "resetAudio",
            id: this.$route.params.id,
            audioNum: audio,
          },
        });
        this.getData();
      } catch (error) {
        console.log(error);
      }
    },

    async submit() {
      try {
        if (this.isLoading) return;
        this.isLoading = true;

        let file1 = this.$refs.promp1.getFile();
        let file2 = this.$refs.promp2.getFile();
        let file3 = this.$refs.promp3.getFile();
        let data = new FormData();
        let id = this.$route.params.id;
        data.append("id", id);
        data.append("file1", file1 ? file1.file : "");
        data.append("file2", file2 ? file2.file : "");
        data.append("file3", file3 ? file3.file : "");
        data.append("enable", this.statusSwitch);
        // data.append("getDay", this.getDay)
        data.append(
          "timespan",
          this.timeFilter == "9999" ? this.getDay : this.timeFilter
        );
        data.append("play_agent_num", this.toggleSwitch);
        data.append(
          "accept_digit",
          this.numberAccept
            ? this.numberAccept == "منتظر بمانید"
              ? "disabled"
              : this.numberAccept
            : "0"
        );
        data.append(
          "agent_num_prefix",
          this.chooseNumber ? this.chooseNumber : '_'
        );
        data.append("priority", this.numbers ? this.numbers : null);
        data.append("method", "uploadAndEdit");
        let result = await axios({
          method: "post",
          url: `${API}/settings/action`,
          data: data,
        });
        console.log(result);
        this.$notify({
          text: "عملیات با موفقیت انجام شد",
          type: "success",
        });
        this.getData();
        return this.$router.push({ path: '/settings' })
      } catch (error) {
        console.error(error);
      }
      this.isLoading = false;
    },
    async setTimeDatePicker() {
      try {
        if (this.loadingCalcDate) return;

        this.loadingCalcDate = true;

        let timeFilter = null;
        switch (this.timeFilter) {
          case "1":
          case "2":
          case "7":
          case "31":
          case "365":
            break;
          default:
            this.getDay = this.timeFilter;
            this.timeFilter = "9999";
            break;
        }
      } catch (error) {
        console.error(error);
      }
      this.loadingCalcDate = false;
    },
  },
  async mounted() {
    await this.getData();
  },
};
</script>

<style lang="scss">
@import '@vueform/toggle/themes/default.css';
@import '~vue-multiselect/dist/vue-multiselect.css';
@import '@vueform/multiselect/themes/default.css';
@import '~filepond/dist/filepond.min.css';
@import '~filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css';

.timeFilter {
  padding: 20px;
  overflow: auto;
  ul {
    display: flex;
    padding: 0;
    background: #dedfe38a;
    padding: 12px;
    border-radius: 10px;
    li {
      cursor: pointer;
      padding: 5px 7px;
      min-width: 100px;
      text-align: center;
      &:hover {
        font-weight: 700;
      }
    }
    .active {
      background-color: dodgerblue;
      border-radius: 7px;
      color: white;
    }
  }
}
.pointer_event * {
  pointer-events: none !important;
  opacity: 0.8;
}
.filepond--wrapper * {
  cursor: pointer !important;
}
.filepond--drop-label {
  box-shadow: 3px 6px 13px #00000054;
  background: #e7e7e7;
}
.filepond--drop-label.filepond--drop-label label {
  font-size: 12px !important;
}
.btn-back {
  background: gainsboro;
  border: black;
  &:hover {
    border: 1px solid rgb(67, 67, 67);
    color: black;
  }
}
</style>
