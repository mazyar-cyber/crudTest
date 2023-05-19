<template>
  <div>
    <div class="col-md-6 col-12">
      <div class="mb-1">
        <label class="form-label" for="email-id-column"
          >Bank Account Number(press ctrl to check)</label
        >
        <input
          type="text"
          class="form-control"
          v-model="ibanValue"
          :class="{ 'is-invalid': bankerrorClass }"
          name="bankAcNumber"
          placeholder="Bank Account Number"
          @keydown="validateUsername()"
        />
        <span v-show="bankerrorClass" class="col-sm-12" style="color: red"
          >Your Input is not a valid International Bank Account Number
          (IBAN)</span
        >
      </div>
    </div>
  </div>
</template>

<script>
import { notEmpty } from "@form-validation/validator-not-empty";
export default {
  data() {
    return {
      ibanValue: "",
      bankerrorClass: false,
    };
  },
  methods: {
    validateUsername() {
      axios
        .post("/api/validate", {
          username: this.ibanValue,
        })
        .then((response) => {
          console.log(response.data);
          this.bankerrorClass = false;
        })
        .catch((error) => {
          console.error(error);
          this.bankerrorClass = true;
        });
    },
  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
