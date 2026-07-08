<!DOCTYPE html>

<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>University Schedule Management</title>
<!-- Tailwind CSS v3 CDN -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<style data-purpose="custom-scrollbar">
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
  </style>
<style data-purpose="table-layout">
    .table-fixed-header thead th {
      position: sticky;
      top: 0;
      background-color: #f8fafc;
      z-index: 10;
    }
  </style>
</head>
<body class="bg-gray-50 text-slate-800 font-sans antialiased">
<!-- BEGIN: MainHeader -->
<header class="bg-white border-b border-gray-200 py-4 px-6 flex justify-between items-center sticky top-0 z-50">
<div class="flex items-center space-x-4">
<!-- Logo Placeholder -->
<div class="w-10 h-10 bg-slate-900 rounded-lg flex items-center justify-center text-white font-bold">
        F
      </div>
<div>
<h1 class="text-lg font-bold uppercase tracking-tight">FACULTAD DE CIENCIA, ARTE Y TECNOLOGÍA</h1>
<p class="text-xs text-gray-500 font-medium">HORARIO DE CLASES - AÑO 2026</p>
</div>
</div>
<nav class="flex items-center space-x-6">
<div class="text-right">
<span class="block text-sm font-semibold">Lic. Jéssica Ibáñez</span>
<span class="block text-[10px] text-gray-400 uppercase">Secretaria</span>
</div>
<div class="h-10 w-10 rounded-full bg-gray-200 border border-gray-300"></div>
</nav>
</header>
<!-- END: MainHeader -->
<!-- BEGIN: Navigation & Breadcrumbs -->
<div class="bg-white border-b border-gray-200 px-6 py-3">
<nav aria-label="Breadcrumb" class="flex text-sm text-gray-500">
<ol class="flex items-center space-x-2">
<li><a class="hover:text-slate-900" href="#">
        Panel
      </a></li>
<li><svg class="w-4 h-4" fill="currentColor" viewbox="0 0 20 20"><path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"></path></svg></li>
<li><a class="hover:text-slate-900" href="#">Management</a></li>
<li><svg class="w-4 h-4" fill="currentColor" viewbox="0 0 20 20"><path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"></path></svg></li>
<li class="font-semibold text-slate-900">
        Horarios
      </li>
</ol>
</nav>
</div>
<!-- END: Navigation & Breadcrumbs -->
<main class="p-6 max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-4 gap-6">
<!-- BEGIN: Sidebar / Room Availability -->
<aside class="lg:col-span-1 space-y-6">
<section class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden" data-purpose="room-availability-card">
<div class="p-4 border-b border-gray-100 bg-gray-50 flex justify-between items-center">
<h2 class="font-bold text-sm uppercase tracking-wide">Room Availability</h2>
<span class="flex h-2 w-2 rounded-full bg-green-500"></span>
</div>
<div class="p-4 space-y-4">
<!-- Room Item -->
<div class="flex items-center justify-between p-3 rounded-lg bg-green-50 border border-green-100">
<div>
<p class="text-sm font-bold text-green-900">SALA 21B</p>
<p class="text-[10px] text-green-700 uppercase">Currently Occupied</p>
</div>
<div class="text-right">
<span class="text-xs font-medium text-green-800">18:20 - 21:30</span>
</div>
</div>
<!-- Room Item -->
<div class="flex items-center justify-between p-3 rounded-lg bg-gray-50 border border-gray-200">
<div>
<p class="text-sm font-bold text-gray-900">SALA 10A</p>
<p class="text-[10px] text-gray-500 uppercase">Available</p>
</div>
<div class="text-right">
<span class="text-xs font-medium text-gray-400">Next: 20:00</span>
</div>
</div>
<!-- Room Item -->
<div class="flex items-center justify-between p-3 rounded-lg bg-gray-50 border border-gray-200">
<div>
<p class="text-sm font-bold text-gray-900">LAB 05</p>
<p class="text-[10px] text-gray-500 uppercase">Available</p>
</div>
</div>
</div>
<div class="p-4 pt-0">
<button class="w-full py-2 text-xs font-semibold text-slate-600 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
            View All Rooms
          </button>
</div>
</section>
<section class="bg-slate-900 rounded-xl p-4 text-white" data-purpose="quick-stats">
<h3 class="text-xs font-medium text-slate-400 uppercase mb-4">Current Semester Summary</h3>
<div class="grid grid-cols-2 gap-4">
<div>
<p class="text-2xl font-bold">20</p>
<p class="text-[10px] text-slate-400 uppercase">Total Weekly Hours</p>
</div>
<div>
<p class="text-2xl font-bold">5</p>
<p class="text-[10px] text-slate-400 uppercase">
        Materias
      </p>
</div>
</div>
</section>
</aside>
<!-- END: Sidebar / Room Availability -->
<!-- BEGIN: Subject Management Table Content -->
<section class="lg:col-span-3 space-y-6">
<!-- Toolbar -->
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
<div class="flex items-center space-x-2 bg-gray-100 p-1 rounded-lg self-start">
<button class="px-4 py-1.5 text-sm font-medium rounded-md bg-white shadow-sm text-slate-900">Table View</button>
<button class="px-4 py-1.5 text-sm font-medium rounded-md text-gray-500 hover:text-slate-900">Calendar View</button>
</div>
<div class="flex items-center space-x-3">
<div class="relative">
<input class="pl-9 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-slate-500 focus:border-slate-500 w-64" placeholder="Search subjects..." type="text"/>
<svg class="w-4 h-4 absolute left-3 top-2.5 text-gray-400" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
</div>
<button class="bg-slate-900 text-white px-4 py-2 rounded-lg text-sm font-semibold flex items-center hover:bg-slate-800 transition-colors">
<svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
            Add New Schedule
          </button>
</div>
</div>
<!-- Main Data Table -->
<div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse table-fixed-header">
<thead>
<tr class="bg-gray-50 border-b border-gray-200">
<th class="px-6 py-4 text-[10px] font-bold text-gray-500 uppercase tracking-wider w-20">
        Acta
      </th>
<th class="px-6 py-4 text-[10px] font-bold text-gray-500 uppercase tracking-wider">
        Nombre de la Materia
      </th>
<th class="px-6 py-4 text-[10px] font-bold text-gray-500 uppercase tracking-wider">
        Profesor
      </th>
<th class="px-6 py-4 text-[10px] font-bold text-gray-500 uppercase tracking-wider w-24 text-center">
        Horas T.
      </th>
<th class="px-6 py-4 text-[10px] font-bold text-gray-500 uppercase tracking-wider w-32">
        Sala
      </th>
<th class="px-6 py-4 text-[10px] font-bold text-gray-500 uppercase tracking-wider w-24">
        Acciones
      </th>
</tr>
</thead>
<tbody class="divide-y divide-gray-100">
@foreach($schedules as $schedule)
<tr class="hover:bg-gray-50 transition-colors">
<td class="px-6 py-4 text-sm font-medium text-slate-600">ID-{{ $schedule->id }}</td>
<td class="px-6 py-4">
<span class="block text-sm font-bold text-slate-900 uppercase">{{ $schedule->subject->name ?? 'N/A' }}</span>
<span class="text-[10px] text-gray-400 font-medium">{{ $schedule->career->name ?? 'N/A' }}</span>
</td>
<td class="px-6 py-4 text-sm text-gray-600">{{ $schedule->teacher->name ?? 'N/A' }}</td>
<td class="px-6 py-4 text-sm text-center font-semibold">{{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}</td>
<td class="px-6 py-4">
<span class="px-2 py-1 rounded bg-slate-100 text-slate-700 text-xs font-bold border border-slate-200">{{ $schedule->classroom->name ?? 'N/A' }}</span>
</td>
<td class="px-6 py-4 flex space-x-2">
<button class="p-1 text-gray-400 hover:text-slate-900 transition-colors" title="Edit">
<svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
</button>
<button class="p-1 text-gray-400 hover:text-red-600 transition-colors" title="Delete">
<svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
</button>
</td>
</tr>
@endforeach
</tbody>
<tfoot>
<tr class="bg-gray-50 border-t border-gray-200">
<td class="px-6 py-4 text-sm font-bold text-slate-900 text-right" colspan="3">TOTAL WEEKLY HOURS:</td>
<td class="px-6 py-4 text-center text-sm font-bold text-slate-900">20</td>
<td colspan="2"></td>
</tr>
</tfoot>
</table>
</div>
<!-- Pagination -->
<div class="px-6 py-4 border-t border-gray-200 bg-white">
    {{ $schedules->links() }}
</div>
</div>
<!-- Footer Info Section -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-4 text-center">
<div>
<p class="text-[10px] text-gray-400 uppercase font-bold mb-6">Director</p>
<p class="text-sm font-bold border-t border-gray-300 pt-2 inline-block px-4">Mgtr. Gabriel Sotelo</p>
</div>
<div>
<p class="text-[10px] text-gray-400 uppercase font-bold mb-6">Directora Académica General</p>
<p class="text-sm font-bold border-t border-gray-300 pt-2 inline-block px-4">Dra. Laura Arévalos</p>
</div>
<div>
<p class="text-[10px] text-gray-400 uppercase font-bold mb-6">Approval Date</p>
<div class="inline-block border border-dashed border-gray-300 px-6 py-2 rounded text-xs text-gray-400 italic">
            Pending Signature
          </div>
</div>
</div>
</section>
<!-- END: Subject Management Table Content -->
</main>
<!-- BEGIN: Mock Modal for 'Add New' (Hidden by default) -->
<div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-[100] hidden items-center justify-center" id="add-schedule-modal">
<div class="bg-white rounded-2xl w-full max-w-lg shadow-2xl overflow-hidden">
<div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50">
<h3 class="font-bold text-lg">Add New Schedule Entry</h3>
<button class="text-gray-400 hover:text-slate-900"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg></button>
</div>
<form class="p-6 space-y-4">
<div>
<label class="block text-xs font-bold text-gray-500 uppercase mb-1">Subject</label>
<select class="w-full rounded-lg border-gray-300 text-sm focus:ring-slate-500 focus:border-slate-500">
<option>Select Subject...</option>
<option>Dibujo Técnico</option>
<option>Matemática</option>
</select>
</div>
<div class="grid grid-cols-2 gap-4">
<div>
<label class="block text-xs font-bold text-gray-500 uppercase mb-1">Day</label>
<select class="w-full rounded-lg border-gray-300 text-sm focus:ring-slate-500 focus:border-slate-500">
<option>Monday</option>
<option>Tuesday</option>
</select>
</div>
<div>
<label class="block text-xs font-bold text-gray-500 uppercase mb-1">
        Sala
      </label>
<select class="w-full rounded-lg border-gray-300 text-sm focus:ring-slate-500 focus:border-slate-500">
<option>Sala 21B</option>
<option>Sala 10A</option>
</select>
</div>
</div>
<div class="flex justify-end space-x-3 pt-4 border-t border-gray-100">
<button class="px-4 py-2 text-sm font-semibold text-gray-600 hover:text-slate-900" type="button">Cancel</button>
<button class="px-6 py-2 bg-slate-900 text-white rounded-lg text-sm font-semibold hover:bg-slate-800" type="submit">Save Entry</button>
</div>
</form>
</div>
</div>
<!-- END: Mock Modal -->
</body></html>