import Calendar from "color-calendar";
import "color-calendar/dist/css/theme-glass.css";
import "color-calendar/dist/css/theme-basic.css";

let calA = new Calendar({
  id: "#calendar-a",
  theme: "glass",
  // border: "5px solid black",
  weekdayType: "long-upper",
  monthDisplayType: "long",
  // headerColor: "yellow",
  // headerBackgroundColor: "black",
  calendarSize: "small",
  layoutModifiers: ["month-left-align"],
  eventsData: [
    {
      id: 1,
      name: "French class",
      start: "2020-12-17T06:00:00",
      end: "2020-12-18T20:30:00"
    },
    {
      id: 2,
      name: "Blockchain 101",
      start: "2020-12-20T10:00:00",
      end: "2020-12-20T11:30:00"
    },
    {
      id: 3,
      name: "Cheese 101",
      start: "2020-12-01T10:00:00",
      end: "2020-12-02T11:30:00"
    },
    {
      id: 4,
      name: "Cheese 101",
      start: "2020-12-01T10:00:00",
      end: "2020-12-02T11:30:00"
    }
  ],
  dateChanged: (currentDate, events) => {
    console.log("date change", currentDate, events);
  },
  monthChanged: (currentDate, events) => {
    console.log("month change", currentDate, events);
  }
});

let calB = new Calendar({
  id: "#calendar-b",
  theme: "basic",
  primaryColor: "#1a237e",
  weekdayType: "short",
  border: "5px solid rgba(4, 64, 160, 0.1)",
  eventsData: [
    {
      id: 1,
      name: "French class",
      start: "2020-12-07T06:00:00",
      end: "2020-12-09T20:30:00"
    },
    {
      id: 2,
      name: "Blockchain 101",
      start: "2020-12-20T10:00:00",
      end: "2020-12-20T11:30:00"
    }
  ]
});
