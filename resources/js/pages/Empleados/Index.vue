<template>
  <div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Lista de Empleados</h1>

    <table class="table-auto w-full border mb-6">
      <thead>
        <tr class="bg-gray-200 text-2xl text-black">
          <th class="border px-4 py-2">Nombre</th>
          <th class="border px-4 py-2">Tipo</th>
          <th class="border px-4 py-2">Salario Base</th>
          <th class="border px-4 py-2">Salario Final</th>
          <th class="border px-4 py-2">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="empleado in empleados" :key="empleado.id">
          <td class="border px-4 py-2">{{ empleado.nombre }}</td>
          <td class="border px-4 py-2">{{ empleado.tipo.replace('_', ' ') }}</td>
          <td class="border px-4 py-2">S/ {{ empleado.salario_base }}</td>
          <td class="border px-4 py-2">S/ {{ empleado.salario_final }}</td>
          <td class="border px-4 py-2 space-x-2">
            <a :href="`/notificar-email/${empleado.id}`"
              class="bg-purple-500 text-white px-2 py-1 rounded hover:bg-purple-600 text-sm" target="_blank">
              Email
            </a>
            <a :href="`/notificar-sms/${empleado.id}`"
              class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600 text-sm" target="_blank">
              SMS
            </a>
          </td>
        </tr>
      </tbody>
    </table>

    <!-- Botones debajo de la tabla -->
    <div class="flex space-x-4 justify-center mt-6">
      <a href="/reporte-pdf" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600" target="_blank">
        Generar PDF
      </a>
      <a href="/reporte-json" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" target="_blank">
        Generar JSON
      </a>
      <a href="/reporte-excel" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Generar Excel</a>
    </div>
    
  </div>
</template>

<script setup>
defineProps({
  empleados: Array
})
</script>
