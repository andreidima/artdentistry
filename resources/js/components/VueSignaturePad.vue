<template>
    <div id="app">
        <input type="text" :name=numeCampDb v-model="signaturepad" v-show="false">
        <div class="container border border-1 p-0 mb-2" style="width:400px; height:200px">
            <VueSignaturePad
            class="bg-white"
            v-model="signaturepad"
            width="400px" height="200px" ref="signaturePad" />
        </div>
        <div class="container" style="width:400px;">
            <div class="mb-2 d-flex justify-content-between">
                <button type="button" class="btn-secondary rounded-3" @click="undo">Șterge semnătura</button>
                <button type="button" class="btn-success text-white rounded-3" @click="save">Salvează semnătura</button>
            </div>
            <div v-if="signaturepad" class="alert-success">
                Semnătura a fost salvată
            </div>
        </div>

  </div>
</template>
<script>
import Vue from 'vue';
import VueSignaturePad from 'vue-signature-pad';

Vue.use(VueSignaturePad);

export default {
  props: [
    'numeCampDb',
    ],
  name: 'MySignaturePad',
  data() {
    return {
      signaturepad: null,
    //   signaturepad: 'asd',
    }
  },
  methods: {
    undo() {
      this.$refs.signaturePad.undoSignature();
      this.signaturepad = null;
    },
    save() {
      const { isEmpty, data } = this.$refs.signaturePad.saveSignature();
    //   console.log(isEmpty);
    //   console.log(data);
      this.signaturepad = data;
    }
  }
};
</script>
