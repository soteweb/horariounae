<!DOCTYPE html>

<html lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>FACAT - Horario de Clases</title>
<!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<!-- Google Fonts: Inter for a clean modern sans-serif look -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
<style data-purpose="typography">
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
<style data-purpose="custom-layout">
    /* Custom scrollbar for a cleaner look */
    ::-webkit-scrollbar {
      width: 6px;
      height: 6px;
    }
    ::-webkit-scrollbar-track {
      background: #f1f1f1;
    }
    ::-webkit-scrollbar-thumb {
      background: #cbd5e1;
      border-radius: 10px;
    }
    ::-webkit-scrollbar-thumb:hover {
      background: #94a3b8;
    }

    /* Imprimir styling */
    @media print {
      .no-print {
        display: none !important;
      }
      .main-content {
        margin: 0 !important;
        padding: 0 !important;
      }
    }
  </style>
</head>
<body class="bg-slate-50 text-slate-900 flex min-h-screen">
<!-- BEGIN: Sidebar -->
<aside class="w-64 bg-slate-900 text-white flex flex-col no-print shrink-0" data-purpose="navigation-sidebar">
<div class="p-6 flex items-center space-x-3">
<!-- University Logo Placeholder -->
<div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center font-bold text-xl">F</div>
<h1 class="text-xl font-bold tracking-tight">FACAT</h1>
</div>
<nav class="flex-1 px-4 py-4 space-y-1">
<a class="flex items-center px-4 py-3 text-slate-400 hover:bg-slate-800 hover:text-white rounded-lg transition-colors duration-200" href="/admin">
<svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
        Panel de Administración
      </a>
<a class="flex items-center px-4 py-3 bg-blue-600 text-white rounded-lg transition-colors duration-200" data-purpose="active-link" href="/">
<svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
        Horarios
      </a>

</nav>
<div class="p-4 border-t border-slate-800">
<div class="flex items-center space-x-3 p-2 bg-slate-800 rounded-lg">
<div class="w-8 h-8 rounded-full bg-slate-600 flex items-center justify-center text-xs">US</div>
<div class="text-xs overflow-hidden">
<p class="font-medium truncate">
        Sistema de Usuario
      </p>
<p class="text-slate-500 truncate">
        Acceso Admin
      </p>
</div>
</div>
</div>
</aside>
<!-- END: Sidebar -->
<!-- BEGIN: Main Content Area -->
<main class="flex-1 flex flex-col overflow-hidden main-content">
<!-- BEGIN: Header & Filters -->
<header class="bg-white border-b border-slate-200 p-6 no-print">
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
<div>
<h2 class="text-2xl font-bold text-slate-800">
        Horario Semanal
      </h2>
<p class="text-sm text-slate-500">{{ $facultyName }} — Año: {{ date('Y') }}</p>
</div>
<div class="flex items-center space-x-3">
<button class="px-4 py-2 border border-slate-200 rounded-lg text-sm font-medium hover:bg-slate-50 flex items-center">
<svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
        Exportarar
      </button>
<button class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm font-medium hover:bg-blue-700 flex items-center shadow-sm" onclick="window.print()">
<svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
        Imprimir
      </button>
</div>
</div>
<!-- Filters Row -->
<form action="/" method="GET" id="filter-form">
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6" data-purpose="filter-bar">
<div>
<label class="block text-xs font-semibold text-slate-500 uppercase mb-1">
        Carrera
      </label>
<select name="career_id" class="w-full rounded-lg border-slate-200 text-sm focus:ring-blue-500 focus:border-blue-500" onchange="document.getElementById('filter-form').submit();">
<option value="">
        -- Seleccionar Carrera --
      </option>
@foreach($careers as $career)
<option value="{{ $career->id }}" {{ $career_id == $career->id ? 'selected' : '' }}>{{ $career->name }}</option>
@endforeach
</select>
</div>
<div>
<label class="block text-xs font-semibold text-slate-500 uppercase mb-1">
        Semestre / Curso
      </label>
<select name="course_id" class="w-full rounded-lg border-slate-200 text-sm focus:ring-blue-500 focus:border-blue-500" onchange="document.getElementById('filter-form').submit();">
<option value="">
        -- Seleccionar Semestre/Curso --
      </option>
@foreach($courses as $course)
<option value="{{ $course->id }}" {{ $course_id == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
@endforeach
</select>
</div>
<div>
<label class="block text-xs font-semibold text-slate-500 uppercase mb-1">
        Turnoo
      </label>
<select name="turn_id" class="w-full rounded-lg border-slate-200 text-sm focus:ring-blue-500 focus:border-blue-500" onchange="document.getElementById('filter-form').submit();">
<option value="">
        -- Seleccionar Turnoo --
      </option>
@foreach($turns as $turn)
<option value="{{ $turn->id }}" {{ $turn_id == $turn->id ? 'selected' : '' }}>{{ $turn->name }}</option>
@endforeach
</select>
</div>
</div>
</form>
</header>
<!-- END: Header & Filters -->
<!-- BEGIN: Schedule Grid -->
<div class="flex-1 overflow-auto p-6" data-purpose="main-schedule-container">
<div class="min-w-[1000px] bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
<table class="w-full border-collapse">
<thead>
<tr class="bg-slate-50 border-b border-slate-200">
<th class="py-4 px-4 text-xs font-bold text-slate-500 uppercase text-center border-r border-slate-200 w-24">Horario</th>
<th class="py-4 px-2 text-xs font-bold text-slate-700 uppercase text-center border-r border-slate-200">Lunes</th>
<th class="py-4 px-2 text-xs font-bold text-slate-700 uppercase text-center border-r border-slate-200">Martes</th>
<th class="py-4 px-2 text-xs font-bold text-slate-700 uppercase text-center border-r border-slate-200">Miércoles</th>
<th class="py-4 px-2 text-xs font-bold text-slate-700 uppercase text-center border-r border-slate-200">Jueves</th>
<th class="py-4 px-2 text-xs font-bold text-slate-700 uppercase text-center border-r border-slate-200">Viernes</th>
<th class="py-4 px-2 text-xs font-bold text-slate-700 uppercase text-center">Sábado</th>
</tr>
</thead>
<tbody>
@foreach($timeSlots as $timeKey => $timeLabel)
    @if($loop->index == 2 && count($timeSlots) >= 4)
        <!-- Recess Slot -->
        <tr class="border-b border-slate-200 bg-slate-100/50 h-10">
        <td class="bg-slate-100 text-center text-[10px] font-bold text-slate-400 border-r border-slate-200">RECESO</td>
        <td class="text-center text-[10px] font-bold text-slate-400 uppercase tracking-widest" colspan="6">RECESO</td>
        </tr>
    @endif
    <tr class="border-b border-slate-200 h-24">
    <td class="bg-slate-50 text-center text-xs font-medium text-slate-500 border-r border-slate-200">{{ $timeLabel }}</td>
    @foreach($days as $day)
        @php
            $sch = $grid[$timeKey][$day] ?? null;
        @endphp
        <td class="p-1 border-r border-slate-200">
        @if($sch)
            <div class="h-full bg-blue-100 border-l-4 border-blue-500 p-2 rounded flex flex-col justify-center text-center">
            <span class="text-[10px] font-bold text-blue-800 uppercase leading-tight">{{ $sch->subject->name }}</span>
            <span class="text-[9px] italic text-blue-700">{{ $sch->teacher->name }}</span>
            <span class="text-[9px] font-semibold text-blue-900 mt-1">SALA {{ $sch->classroom->name }}</span>
            </div>
        @else
            <div class="h-full"></div>
        @endif
        </td>
    @endforeach
    </tr>
@endforeach
</tbody>
</table>
</div>
<!-- BEGIN: Footer Details -->
<div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-8" data-purpose="summary-and-signatures">
<!-- Materias Summary -->
<div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
<h3 class="text-sm font-bold text-slate-800 mb-4 border-b pb-2 uppercase tracking-wide">Resumen Semanal de Materias</h3>
<table class="w-full text-xs text-left">
<thead>
<tr class="text-slate-500 font-semibold border-b border-slate-100">
<th class="py-2">
        Acta
      </th>
<th class="py-2">Materia</th>
<th class="py-2 text-center">Horas</th>
</tr>
</thead>
<tbody class="divide-y divide-slate-100">
@forelse($subjectsSummary as $subject)
<tr>
    <td class="py-2">{{ $subject['identifier'] ?? '-' }}</td>
    <td class="py-2">{{ $subject['name'] }}</td>
    <td class="py-2 text-center">{{ $subject['hours'] }}</td>
</tr>
@empty
<tr>
    <td class="py-2 text-center text-slate-500 italic" colspan="3">Seleccione una carrera, curso y turno para ver el resumen.</td>
</tr>
@endforelse
</tbody>
</table>
</div>
<!-- Signatures Section -->
<div class="flex flex-col justify-end">
<div class="grid grid-cols-3 gap-4 text-center">
<div class="flex flex-col items-center">
<div class="w-32 border-b border-slate-300 mb-2 mt-12"></div>
<p class="text-[10px] font-semibold text-slate-700">Secretaria</p>
<p class="text-[9px] text-slate-500">Lic. Jéssica Ibáñez</p>
</div>
<div class="flex flex-col items-center">
<div class="w-32 border-b border-slate-300 mb-2 mt-12"></div>
<p class="text-[10px] font-semibold text-slate-700">Director</p>
<p class="text-[9px] text-slate-500">Mgtr. Gabriel Sotelo</p>
</div>
<div class="flex flex-col items-center">
<div class="w-32 border-b border-slate-300 mb-2 mt-12"></div>
<p class="text-[10px] font-semibold text-slate-700">Directora Académica General</p>
<p class="text-[9px] text-slate-500">Dra. Laura Arévalos</p>
</div>
</div>
<div class="mt-8 text-right">
<div class="inline-block p-2 border border-slate-200 rounded text-[10px] text-slate-400">
               Fecha de Aprobación: <span class="ml-4">___/___/2026</span>
</div>
</div>
</div>
</div>
<!-- END: Footer Details -->
</div>
<!-- END: Schedule Grid -->
</main>
<!-- END: Main Content Area -->
</body></html>