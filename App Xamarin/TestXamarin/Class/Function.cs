using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using Android.App;
using Android.Content;
using Android.OS;
using Android.Runtime;
using Android.Views;
using Android.Widget;

namespace TestXamarin.Class
{
    class Function
    {
        public int getIntDayofWeek(int pYear, int pMonth)
        {
            DateTime DateFirstDay = new DateTime(pYear, pMonth, 1);
            int dayNumberOfWeek = (int)DateFirstDay.DayOfWeek;
            return dayNumberOfWeek;
        }
    }
}