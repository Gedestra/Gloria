/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
	/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
	/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
	/******/ 			i: moduleId,
	/******/ 			l: false,
	/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
	/******/ 		if(!__webpack_require__.o(exports, name)) {
		/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
	/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
	/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
		/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
	/******/ 		}
	/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
	/******/ 		if(mode & 1) value = __webpack_require__(value);
	/******/ 		if(mode & 8) return value;
	/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
	/******/ 		var ns = Object.create(null);
	/******/ 		__webpack_require__.r(ns);
	/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
	/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
	/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
	/******/ 		var getter = module && module.__esModule ?
	/******/ 			function getDefault() { return module['default']; } :
	/******/ 			function getModuleExports() { return module; };
	/******/ 		__webpack_require__.d(getter, 'a', getter);
	/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "../src/assets/js/pages/components/calendar/external-events.js");
/******/ })
/************************************************************************/
/******/ ({

	/***/ "../src/assets/js/pages/components/calendar/external-events.js":
/*!*********************************************************************!*
  !*** ../src/assets/js/pages/components/calendar/external-events.js ***!
  *********************************************************************/
  /*! no static exports found */
  /***/ (function(module, exports, __webpack_require__) {

  	
  	var data;


  	var KTCalendarExternalEvents = function() {    
  		var initExternalEvents = function() {
  			$('#kt_calendar_external_events .fc-draggable-handle').each(function() {
            // store data so the calendar knows to render an event upon drop
            $(this).data('event', {
                title: $.trim($(this).text()), // use the element's text as the event title
                stick: true, // maintain when user navigates (see docs on the renderEvent method)
                classNames: [$(this).data('color')],
                description: 'Lorem ipsum dolor eius mod tempor labore'
            });
        });
  		}    
  		var initCalendar = function() {

  			var todayDate = moment().startOf('day');
  			var momentoActual = new Date()
  			var hora = momentoActual.getHours()
  			var minuto = momentoActual.getMinutes()
  			var segundo = momentoActual.getSeconds()
  			if ((hora >= 0)&&(hora <= 9)){ 
  				var horas="0"+hora; 
  			}

  			if ((minuto >= 0)&&(minuto <= 9)){ 
  				minuto="0"+minuto; 
  			}

  			if ((segundo >= 0)&&(segundo <= 9)){ 
  				segundo="0"+segundo; 
  			}
  			var horaImprimible = hora+":"+minuto+":00";
  			var YM = todayDate.format('YYYY-MM');
  			var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
  			var TODAY = todayDate.format('YYYY-MM-DD');
  			var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');        
  			var calendarEl = document.getElementById('kt_calendar');
  			var containerEl = document.getElementById('kt_calendar_external_events');        
  			var Draggable = FullCalendarInteraction.Draggable;  
  			
  			new Draggable(containerEl, 
  			{
  				itemSelector: '.fc-draggable-handle',
  				eventData: function(eventEl) {
  					return $(eventEl).data('event');
  				}   
  			});
  			
  			
  			var table = $.ajax({
  				type : "GET",
  				url : "funciones/actividades.calendario.php",
  				success : res => {
  					res = JSON.parse(res);
  					res.forEach(element => {
  						data = {
  							actividad: element[0],
  							nombreEmpleado: element[1],
  							apellidoEmpleado: element[2]
  						}
  						console.log(data.actividad);
  					})
  				},
  				error : err => {
  					console.error(err);     
  				}
  			});    
  			
  			var calendar = new FullCalendar.Calendar(calendarEl, {
  				plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],            
  				isRTL: KTUtil.isRTL(),
  				header: {
  					left: 'prev,next today',
  					center: 'title',
  					right: 'dayGridMonth,timeGridWeek,timeGridDay'
  				},    
  				height: 800,
  				contentHeight: 780,
            aspectRatio: 3,  // see: https://fullcalendar.io/docs/aspectRatio            
            nowIndicator: true,
            now: TODAY + 'T'+ horaImprimible, // just for demo            
            views: {
            	dayGridMonth: { buttonText: 'Mes' },
            	timeGridWeek: { buttonText: 'Semana' },
            	timeGridDay: { buttonText: 'día' }
            },            
            defaultView: 'timeGridWeek',
            defaultDate: TODAY,            
            droppable: true, // this allows things to be dropped onto the calendar
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            navLinks: true,
            events: [
            {
            	title: 'test',
            	start: YM + '-01',
            	description: 'Mantenimiento de pestallas a Fatima',
            	className: "fc-event-danger fc-event-solid-warning"  
            },
            {
            	title: 'test ocejo',
            	start:'2020-02-11T11:00:00',
            	end:'2020-02-11T12:00:00',
            	description: 'Mantenimiento de pestallas a Fatima',
            	className: "fc-event-danger fc-event-solid-warning"  
            }
            ],            
            drop: function(arg) {
                // is the "remove after drop" checkbox checked?
                if ($('#kt_calendar_external_events_remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(arg.draggedEl).remove();
                }
            },            
            eventRender: function(info) {
            	var element = $(info.el);                
            	if (info.event.extendedProps && info.event.extendedProps.description) {
            		if (element.hasClass('fc-day-grid-event')) {
            			element.data('content', info.event.extendedProps.description);
            			element.data('placement', 'top');
            			KTApp.initPopover(element);
            		} else if (element.hasClass('fc-time-grid-event')) {
            			element.find('.fc-title').append('<div class="fc-description">' + info.event.extendedProps.description + '</div>'); 
            		} else if (element.find('.fc-list-item-title').lenght !== 0) {
            			element.find('.fc-list-item-title').append('<div class="fc-description">' + info.event.extendedProps.description + '</div>'); 
            		}
            	} 
            }
        });        
  			calendar.render();        
  		}    
  		return {
        //main function to initiate the module
        init: function() {
        	initExternalEvents();
        	initCalendar(); 
        }
    }
}();
jQuery(document).ready(function() {
	KTCalendarExternalEvents.init();
});

/***/ })

/******/ });