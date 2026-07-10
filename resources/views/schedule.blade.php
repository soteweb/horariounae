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
      aside, header, .no-print {
        display: none !important;
      }
      .main-content {
        margin: 0 !important;
        padding: 0 !important;
      }
      @page { size: A4 landscape; margin: 10mm; }
      body { background: white !important; }
    }

    /* ---------------- HEADER INSTITUCIONAL ---------------- */
    .inst-header {
        text-align: center;
        margin-bottom: 20px;
        font-family: "Times New Roman", Times, serif;
    }
    .inst-header h2 { font-size: 18px; font-weight: bold; margin: 0; line-height: 1.2; }
    .inst-header h3 { font-size: 16px; font-weight: bold; margin: 0; line-height: 1.2; }
    .inst-header h4 { font-size: 14px; font-weight: normal; margin: 5px 0 0 0; }

    .inst-info-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 15px;
        font-size: 11px;
        font-weight: bold;
    }
    .inst-info-table td { padding: 4px 8px; }
    
    /* ---------------- MAIN SCHEDULE GRID ---------------- */
    .inst-grid {
        width: 100%;
        border-collapse: collapse;
        font-size: 11px;
        border: 2px solid #000;
        table-layout: fixed;
        background: #fff;
    }
    .inst-grid th, .inst-grid td {
        border: 1px solid #000;
        text-align: center;
        vertical-align: middle;
        padding: 4px;
    }
    .inst-grid th {
        font-weight: bold;
        text-transform: uppercase;
        padding: 8px 4px;
    }
    .inst-grid .time-col {
        width: 80px;
        font-weight: normal;
        font-size: 10px;
    }
    
    .cell-wrap { position: relative; width: 100%; height: 100%; min-height: 60px; display: flex; flex-direction: column; justify-content: center; align-items: center;}
    
    .bg-green { background-color: #dcedc8 !important; color: #000; } 
    .bg-blue { background-color: #e3f2fd !important; color: #000; } 
    .bg-yellow { background-color: #fff9c4 !important; color: #000; } 
    @media print {
        .bg-green { background-color: #dcedc8 !important; -webkit-print-color-adjust: exact; print-color-adjust: exact; }
        .bg-blue { background-color: #e3f2fd !important; -webkit-print-color-adjust: exact; print-color-adjust: exact; }
        .bg-yellow { background-color: #fff9c4 !important; -webkit-print-color-adjust: exact; print-color-adjust: exact; }
    }

    .subj-name { font-weight: bold; text-transform: uppercase; font-size: 11px; line-height: 1.2; margin-bottom: 4px; }
    .subj-teacher { font-style: italic; font-size: 10px; line-height: 1.1; margin-bottom: 2px; }
    .subj-room { font-style: italic; font-size: 10px; line-height: 1.1; }

    /* Receso */
    .row-receso td { font-weight: bold; font-size: 11px; padding: 6px; }

    /* ---------------- FOOTER / SUMMARY ---------------- */
    .inst-footer {
        margin-top: 15px;
        display: flex;
        gap: 15px;
        align-items: flex-start;
        background: #fff;
    }
    .inst-summary {
        flex: 1;
        border-collapse: collapse;
        font-size: 10px;
        border: 2px solid #000;
    }
    .inst-summary th, .inst-summary td {
        border: 1px solid #000;
        padding: 4px;
        text-align: center;
    }
    .inst-summary th { font-weight: bold; }
    .inst-summary td.text-left { text-align: left; padding-left: 8px; }

    .inst-signatures {
        width: 350px;
        font-size: 10px;
        background: #fff;
    }
    .sig-date {
        border: 1px solid #000;
        text-align: center;
        padding: 4px;
        font-weight: bold;
        margin-bottom: 30px;
        width: 150px;
        margin-left: auto;
    }
    .sig-date-box { border-top: 1px solid #000; height: 15px; margin-top: 5px; }
    .sig-lines {
        display: flex;
        justify-content: space-between;
        margin-top: 40px;
    }
    .sig-line {
        border-top: 1px solid #000;
        padding-top: 4px;
        text-align: center;
        width: 30%;
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

    @if(!$career_id || !$course_id || !$turn_id)
        <div style="padding: 40px; text-align: center; color: #6b7280; background: #fff; border-radius: 12px; border: 1px solid #e5e7eb;">
            Seleccione una Carrera, Curso y Turno para ver el horario en formato institucional.
        </div>
    @else
        @php
            $subjectColors = [];
            $colorClasses = ['bg-green', 'bg-blue', 'bg-yellow'];
            $colorIdx = 0;

            foreach($grid as $timeKey => $daysGrid) {
                foreach($daysGrid as $sch) {
                    if ($sch && !isset($subjectColors[$sch->subject_id])) {
                        $subjectColors[$sch->subject_id] = $colorClasses[$colorIdx % 3];
                        $colorIdx++;
                    }
                }
            }
        @endphp

        <!-- INSTITUTIONAL HEADER -->
        <div class="inst-header bg-white pt-6 pb-2 px-6 shadow-sm border border-b-0 border-slate-200">
            <h2>UNIVERSIDAD AUTÓNOMA DE ENCARNACIÓN</h2>
            <h3>FACULTAD DE CIENCIA, ARTE Y TECNOLOGÍA</h3>
            <h4>HORARIO DE CLASES</h4>
        </div>

        <div class="bg-white px-6 pb-6 shadow-sm border border-t-0 border-slate-200">
            <table class="inst-info-table">
                <tr>
                    <td style="width:50%">CARRERA: <span style="font-weight:normal; font-style:italic;">{{ mb_strtoupper($careerName) }}</span></td>
                    <td style="width:25%">TURNO: <span style="font-weight:normal; font-style:italic;">NOCHE</span></td>
                    <td style="width:25%">AÑO: <span style="font-weight:normal; font-style:italic;">{{ date('Y') }}</span></td>
                </tr>
                <tr>
                    @php
                        $courseObj = \App\Models\Course::find($course_id);
                        $courseName = $courseObj->name ?? '';
                        $coursePeriod = $courseObj->period ?? '';
                    @endphp
                    <td>CURSO: <span style="font-weight:normal; font-style:italic;">{{ mb_strtoupper($courseName) }}</span></td>
                    <td colspan="2">SEMESTRE: <span style="font-weight:normal; font-style:italic;">{{ mb_strtoupper($coursePeriod) }}</span></td>
                </tr>
            </table>

            <!-- MAIN SCHEDULE GRID -->
            <table class="inst-grid">
                <thead>
                    <tr>
                        <th class="time-col">HORARIO</th>
                        @foreach($days as $day)
                            <th>{{ mb_strtoupper($day) }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($timeSlots as $timeKey => $timeLabel)
                        @if($loop->index == 2 && count($timeSlots) >= 4)
                            <tr class="row-receso">
                                <td class="time-col">19:50-20:00</td>
                                @foreach($days as $day)
                                    <td>RECESO</td>
                                @endforeach
                            </tr>
                        @endif
                        <tr>
                            <td class="time-col">{{ $timeLabel }}</td>
                            @foreach($days as $day)
                                @php
                                    $sch = $grid[$timeKey][$day] ?? null;
                                @endphp
                                @if($sch)
                                    @php
                                        $bgColorClass = $subjectColors[$sch->subject_id] ?? '';
                                    @endphp
                                    <td class="{{ $bgColorClass }}">
                                        <div class="cell-wrap has-content">
                                            <div class="subj-name">{{ mb_strtoupper($sch->subject?->name ?? 'MATERIA') }}</div>
                                            <div class="subj-teacher">{{ mb_strtoupper($sch->teacher?->name ?? 'DOCENTE') }}</div>
                                            <div class="subj-room">SALA {{ mb_strtoupper($sch->classroom?->name ?? 'N/A') }}</div>
                                        </div>
                                    </td>
                                @else
                                    <td>
                                        <div class="cell-wrap"></div>
                                    </td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- FOOTER / SUMMARY -->
            <div class="inst-footer">
                <table class="inst-summary">
                    <thead>
                        <tr>
                            <th style="width:15%">FACULTAD</th>
                            <th style="width:15%">ACTA</th>
                            <th style="width:45%">Resumen Semanal de Materias</th>
                            <th style="width:10%">T.Horas</th>
                            <th style="width:15%">Observaciones<br><span style="font-size:7px;font-weight:normal">(Consignar clases combinadas)</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($subjectsSummary as $subjectId => $subject)
                            <tr>
                                @php
                                    $fac = \App\Models\Subject::find($subjectId)->faculty ?? null;
                                    $facName = $fac ? $fac->name : 'FACAT';
                                @endphp
                                <td style="font-style:italic;">{{ mb_strtoupper($facName) }}</td>
                                <td>{{ mb_strtoupper($subject['identifier'] ?? '-') }}</td>
                                <td class="text-left">{{ mb_convert_case($subject['name'], MB_CASE_TITLE, "UTF-8") }}</td>
                                <td>{{ $subject['hours'] }}</td>
                                <td></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="padding: 10px; color: #999;">Agregue clases al horario para generar el resumen.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="inst-signatures">
                    <div class="sig-date">
                        Fecha de Aprobación:<br>
                        <span style="font-weight:normal;">{{ \App\Models\Setting::where('key', 'approval_date')->value('value') ?? '___/___/2026' }}</span>
                        <div class="sig-date-box"></div>
                    </div>
                    <div class="sig-lines">
                        <div class="sig-line" style="position: relative;">
                            @php $secSig = \App\Models\Setting::where('key', 'secretary_signature')->value('value'); @endphp
                            @if($secSig)<img src="{{ asset('storage/' . $secSig) }}" style="position:absolute; bottom:100%; margin-bottom:-15px; left:50%; transform:translateX(-50%); max-height:60px; max-width:140px; object-fit:contain; z-index:10; mix-blend-mode:multiply;" alt="">@endif
                            Secretario/a<br><span style="font-size:8px;font-weight:normal;">{{ \App\Models\Setting::where('key', 'secretary_name')->value('value') ?? 'Lic. Jéssica Ibáñez' }}</span>
                        </div>
                        <div class="sig-line" style="position: relative;">
                            @php $dirSig = \App\Models\Setting::where('key', 'director_signature')->value('value'); @endphp
                            @if($dirSig)<img src="{{ asset('storage/' . $dirSig) }}" style="position:absolute; bottom:100%; margin-bottom:-15px; left:50%; transform:translateX(-50%); max-height:60px; max-width:140px; object-fit:contain; z-index:10; mix-blend-mode:multiply;" alt="">@endif
                            Decano/Director<br><span style="font-size:8px;font-weight:normal;">{{ \App\Models\Setting::where('key', 'director_name')->value('value') ?? 'Mgtr. Gabriel Sotelo' }}</span>
                        </div>
                        <div class="sig-line" style="position: relative;">
                            @php $acadSig = \App\Models\Setting::where('key', 'academic_director_signature')->value('value'); @endphp
                            @if($acadSig)<img src="{{ asset('storage/' . $acadSig) }}" style="position:absolute; bottom:100%; margin-bottom:-15px; left:50%; transform:translateX(-50%); max-height:60px; max-width:140px; object-fit:contain; z-index:10; mix-blend-mode:multiply;" alt="">@endif
                            Directora Académica General<br><span style="font-size:8px;font-weight:normal;">{{ \App\Models\Setting::where('key', 'academic_director_name')->value('value') ?? 'Dra. Laura Arévalos' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
<!-- END: Schedule Grid -->
</main>
<!-- END: Main Content Area -->
</body></html>