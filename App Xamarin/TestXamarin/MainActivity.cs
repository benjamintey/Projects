using System;
using Android.Graphics;
using Android.App;
using Android.OS;
using Android.Runtime;
using Android.Support.Design.Widget;
using Android.Support.V7.App;
using Android.Views;
using Android.Widget;
using TestXamarin.Class;
using System.Collections.Generic;
using System.Net;
using System.Globalization;
using Xamarin;
using System.Net.Http;
using Newtonsoft.Json;
using System.Linq;

namespace TestXamarin
{
    [Activity(Label = "@string/app_name", Theme = "@style/AppTheme.NoActionBar", MainLauncher = true)]
    public class MainActivity : AppCompatActivity
    {
        Function oFunction = new Function();
        string fullMonthName;
        string allselecteddates;
        string login;
        string password;
        TextView Mois;
        Button btnClicked;
        List<EtatJour> AllEtatJours;
        List<Visiteur> AllVisiteurs;
        List<nbConges> nbConges;
        Visiteur ConnectedVisitor;
        Dictionary<int, Button> CollButton= new Dictionary<int, Button>();
        Dictionary<string, Button> CollSelectedButton = new Dictionary<string, Button>();
        int Year = DateTime.Now.Year;
        int Month = DateTime.Now.Month;
        int ButtonCount;
        protected override void OnCreate(Bundle savedInstanceState)
        {
            base.OnCreate(savedInstanceState);
            SetContentView(Resource.Layout.login);
            Button btn_connection = FindViewById<Button>(Resource.Id.connection);
            btn_connection.Click += this.SeConnecter;
        }
        public void Clicked(object sender, EventArgs e)
        {
            
            if (ButtonCount < 1)
            {
                TimeSpan tt = new TimeSpan(0, 0, 1);
                StartTimer(tt, TestHandleFunc);
            }
            ButtonCount++;
            Button sender_btn = (Button)sender;
            btnClicked = sender_btn;
        }
        public void CloseInfo(object sender, EventArgs e)
        {
            LinearLayout Layout = FindViewById<LinearLayout>(Resource.Id.linearLayout1);
            Layout.Visibility = ViewStates.Gone;
            foreach (var button in CollButton)
            {
                button.Value.Visibility = ViewStates.Visible;
            }
            ButtonCount = 0;
        }
        public void NextMonth(object sender, EventArgs e)
        {
            ButtonCount = 0;
            if (Month != 12)
            {
                Month = Month + 1;
            }
            else
            {
                Year = Year + 1;
                Month = 1;
            }
            int daysincurrentmonth = DateTime.DaysInMonth(Year, Month);
            int IntDayofWeek = oFunction.getIntDayofWeek(Year, Month);
            foreach (var button in CollButton)
            {
                button.Value.Visibility = ViewStates.Gone;
            }
            CollButton.Clear();
            Mois = FindViewById<TextView>(Resource.Id.month);
            fullMonthName = new DateTime(2015, Month, 1).ToString("MMMM", CultureInfo.CreateSpecificCulture("fr"));
            Mois.Text = fullMonthName + " "+ Year;
            Button btn;
            int DayPos = 0;
            for (int i = 1; i <= daysincurrentmonth; i++)
            {
                DayPos = i + IntDayofWeek - 1;
                switch (DayPos)
                {
                    case 1:
                        btn = FindViewById<Button>(Resource.Id.btn_1);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 2:
                        btn = FindViewById<Button>(Resource.Id.btn_2);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 3:
                        btn = FindViewById<Button>(Resource.Id.btn_3);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 4:
                        btn = FindViewById<Button>(Resource.Id.btn_4);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 5:
                        btn = FindViewById<Button>(Resource.Id.btn_5);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 6:
                        btn = FindViewById<Button>(Resource.Id.btn_6);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 7:
                        btn = FindViewById<Button>(Resource.Id.btn_7);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 8:
                        btn = FindViewById<Button>(Resource.Id.btn_8);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 9:
                        btn = FindViewById<Button>(Resource.Id.btn_9);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 10:
                        btn = FindViewById<Button>(Resource.Id.btn_10);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 11:
                        btn = FindViewById<Button>(Resource.Id.btn_11);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 12:
                        btn = FindViewById<Button>(Resource.Id.btn_12);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 13:
                        btn = FindViewById<Button>(Resource.Id.btn_13);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 14:
                        btn = FindViewById<Button>(Resource.Id.btn_14);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 15:
                        btn = FindViewById<Button>(Resource.Id.btn_15);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 16:
                        btn = FindViewById<Button>(Resource.Id.btn_16);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 17:
                        btn = FindViewById<Button>(Resource.Id.btn_17);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 18:
                        btn = FindViewById<Button>(Resource.Id.btn_18);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 19:
                        btn = FindViewById<Button>(Resource.Id.btn_19);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 20:
                        btn = FindViewById<Button>(Resource.Id.btn_20);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 21:
                        btn = FindViewById<Button>(Resource.Id.btn_21);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 22:
                        btn = FindViewById<Button>(Resource.Id.btn_22);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 23:
                        btn = FindViewById<Button>(Resource.Id.btn_23);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 24:
                        btn = FindViewById<Button>(Resource.Id.btn_24);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 25:
                        btn = FindViewById<Button>(Resource.Id.btn_25);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 26:
                        btn = FindViewById<Button>(Resource.Id.btn_26);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 27:
                        btn = FindViewById<Button>(Resource.Id.btn_27);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 28:
                        btn = FindViewById<Button>(Resource.Id.btn_28);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 29:
                        btn = FindViewById<Button>(Resource.Id.btn_29);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 30:
                        btn = FindViewById<Button>(Resource.Id.btn_30);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 31:
                        btn = FindViewById<Button>(Resource.Id.btn_31);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 32:
                        btn = FindViewById<Button>(Resource.Id.btn_32);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 33:
                        btn = FindViewById<Button>(Resource.Id.btn_33);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 34:
                        btn = FindViewById<Button>(Resource.Id.btn_34);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 35:
                        btn = FindViewById<Button>(Resource.Id.btn_35);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 36:
                        btn = FindViewById<Button>(Resource.Id.btn_36);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 37:
                        btn = FindViewById<Button>(Resource.Id.btn_37);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;

                }
            }
            GetEtatJours();
        }
        public void PreviousMonth(object sender, EventArgs e)
        {
            ButtonCount = 0;
            if (Month != 1)
            {
                Month = Month - 1;
            }
            else
            {
                Year = Year - 1;
                Month = 12;
            }
            int daysincurrentmonth = DateTime.DaysInMonth(Year, Month);
            int IntDayofWeek = oFunction.getIntDayofWeek(Year, Month);
            foreach (var button in CollButton)
            {
                button.Value.Visibility = ViewStates.Gone;
            }
            CollButton.Clear();
            Mois = FindViewById<TextView>(Resource.Id.month);
            fullMonthName = new DateTime(2015, Month, 1).ToString("MMMM", CultureInfo.CreateSpecificCulture("fr"));
            Mois.Text = fullMonthName+ " " + Year;
            Button btn;
            int DayPos = 0;
            for (int i = 1; i <= daysincurrentmonth; i++)
            {
                DayPos = i + IntDayofWeek - 1;
                switch (DayPos)
                {
                    case 1:
                        btn = FindViewById<Button>(Resource.Id.btn_1);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 2:
                        btn = FindViewById<Button>(Resource.Id.btn_2);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 3:
                        btn = FindViewById<Button>(Resource.Id.btn_3);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 4:
                        btn = FindViewById<Button>(Resource.Id.btn_4);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 5:
                        btn = FindViewById<Button>(Resource.Id.btn_5);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 6:
                        btn = FindViewById<Button>(Resource.Id.btn_6);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 7:
                        btn = FindViewById<Button>(Resource.Id.btn_7);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 8:
                        btn = FindViewById<Button>(Resource.Id.btn_8);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 9:
                        btn = FindViewById<Button>(Resource.Id.btn_9);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 10:
                        btn = FindViewById<Button>(Resource.Id.btn_10);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 11:
                        btn = FindViewById<Button>(Resource.Id.btn_11);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 12:
                        btn = FindViewById<Button>(Resource.Id.btn_12);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 13:
                        btn = FindViewById<Button>(Resource.Id.btn_13);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 14:
                        btn = FindViewById<Button>(Resource.Id.btn_14);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 15:
                        btn = FindViewById<Button>(Resource.Id.btn_15);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 16:
                        btn = FindViewById<Button>(Resource.Id.btn_16);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 17:
                        btn = FindViewById<Button>(Resource.Id.btn_17);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 18:
                        btn = FindViewById<Button>(Resource.Id.btn_18);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 19:
                        btn = FindViewById<Button>(Resource.Id.btn_19);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 20:
                        btn = FindViewById<Button>(Resource.Id.btn_20);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 21:
                        btn = FindViewById<Button>(Resource.Id.btn_21);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 22:
                        btn = FindViewById<Button>(Resource.Id.btn_22);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 23:
                        btn = FindViewById<Button>(Resource.Id.btn_23);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 24:
                        btn = FindViewById<Button>(Resource.Id.btn_24);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 25:
                        btn = FindViewById<Button>(Resource.Id.btn_25);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 26:
                        btn = FindViewById<Button>(Resource.Id.btn_26);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 27:
                        btn = FindViewById<Button>(Resource.Id.btn_27);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 28:
                        btn = FindViewById<Button>(Resource.Id.btn_28);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 29:
                        btn = FindViewById<Button>(Resource.Id.btn_29);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 30:
                        btn = FindViewById<Button>(Resource.Id.btn_30);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 31:
                        btn = FindViewById<Button>(Resource.Id.btn_31);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 32:
                        btn = FindViewById<Button>(Resource.Id.btn_32);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 33:
                        btn = FindViewById<Button>(Resource.Id.btn_33);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 34:
                        btn = FindViewById<Button>(Resource.Id.btn_34);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 35:
                        btn = FindViewById<Button>(Resource.Id.btn_35);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 36:
                        btn = FindViewById<Button>(Resource.Id.btn_36);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 37:
                        btn = FindViewById<Button>(Resource.Id.btn_37);
                        btn.Visibility = ViewStates.Visible;
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;

                }
            }
            GetEtatJours();
        }
        public async void GetEtatJours()
        {
            HttpClient client = new HttpClient();
            string URL = "http://projetbenjaminteyssier.c1.biz/api/Method/getEtatJours.php";
            string idVisiteur = ConnectedVisitor.id;
            string l_month = Month.ToString();
            URL = URL + "?idVisiteur=" + idVisiteur + "&mois=" + l_month;
            var response = await client.GetStringAsync(URL);
            AllEtatJours = JsonConvert.DeserializeObject<List<EtatJour>>(response);
            foreach (var button in CollButton)
            {
                string Day;
                string jour;
                foreach (EtatJour unEtat in AllEtatJours)
                {
                    Day = button.Value.Text;
                    int DayInt = Int32.Parse(Day);
                    jour = Year.ToString("00") + "-" + Month.ToString("00") + "-" + DayInt.ToString("00");
                    if (jour == unEtat.jour)
                    {
                        if (unEtat.etatjour == "WE")
                        {
                            button.Value.SetBackgroundResource(Resource.Drawable.WE);
                        }
                        else if(unEtat.etatjour == "JF")
                        {
                            button.Value.SetBackgroundResource(Resource.Drawable.ferie);
                        }
                        else if(unEtat.etatjour == "CA" || unEtat.etatjour == "CDM" || unEtat.etatjour == "CDV" || unEtat.etatjour == "CEM" || unEtat.etatjour == "CJD" || unEtat.etatjour == "CM" || unEtat.etatjour == "CN" || unEtat.etatjour == "CP" || unEtat.etatjour == "CPA" || unEtat.etatjour == "JRC" || unEtat.etatjour == "JRI")
                        {
                            button.Value.SetBackgroundResource(Resource.Drawable.conges);
                        }
                        else if(unEtat.etatjour == "CMA")
                        {
                            button.Value.SetBackgroundResource(Resource.Drawable.malade);
                        }
                    }
                }
            }
        }
        public async void GetVisiteurs()
        {
            HttpClient client = new HttpClient();
            string URL = "http://projetbenjaminteyssier.c1.biz/api/Method/getVisiteurs.php";
            var response = await client.GetStringAsync(URL);
            AllVisiteurs = JsonConvert.DeserializeObject<List<Visiteur>>(response);
            bool allowconnection = false;
            foreach(Visiteur unVisiteur in AllVisiteurs)
            {
                if(unVisiteur.login == login && unVisiteur.mdp == password)
                {
                    allowconnection = true;
                    ConnectedVisitor = unVisiteur;
                }
            }
            if(allowconnection == true)
            {
                SetContentView(Resource.Layout.activity_main);
                InitialisationCalendrier();
            }
            else
            {
                TextView error = FindViewById<TextView>(Resource.Id.error);
                error.Visibility = ViewStates.Visible;
                EditText oPassword = FindViewById<EditText>(Resource.Id.enterpassword);
                oPassword.Text = "";
            }
        }
        public async void GetNbJourConges()
        {
            HttpClient client = new HttpClient();
            string idVisiteur = this.ConnectedVisitor.id;
            string URL = "http://projetbenjaminteyssier.c1.biz/api/Method/getNbConges.php";
            URL = URL + "?idVisiteur=" + idVisiteur;
            string response = await client.GetStringAsync(URL);
            nbConges = JsonConvert.DeserializeObject<List<nbConges>>(response);
            SetContentView(2130968603);
            TextView TVnbConges = FindViewById<TextView>(Resource.Id.NbCongesPris);
            Button btnRetour = FindViewById<Button>(Resource.Id.btnRetour);
            btnRetour.Click += new EventHandler(Retour);
            foreach (nbConges nbConge in nbConges)
            {
                nbConges unConges = nbConge;
                TVnbConges.Text = unConges.nbJour;
                unConges = null;
            }
        }
        public bool TestHandleFunc()
        {
            string Day = btnClicked.Text;
            string selectedDate = Year.ToString("00") + "-" + Month.ToString("00") + "-" + Day;
            TextView SelectedDates = FindViewById<TextView>(Resource.Id.insertdates);
            if (ButtonCount > 1)
            {
                TextView etatjour = FindViewById<TextView>(Resource.Id.filletatjour);
                TextView date = FindViewById<TextView>(Resource.Id.filldate);
                date.Text = selectedDate;
                LinearLayout Layout = FindViewById<LinearLayout>(Resource.Id.linearLayout1);
                Layout.Visibility = ViewStates.Visible;
                Button btn_Close = FindViewById<Button>(Resource.Id.btn_close);
                btn_Close.Click += CloseInfo;
                foreach (EtatJour unEtat in AllEtatJours)
                {
                    if (unEtat.jour == selectedDate)
                    {
                        etatjour.Text = unEtat.etatjour;
                    }
                }
                foreach (var button in CollButton)
                {
                    button.Value.Visibility = ViewStates.Gone;
                }

            }
            else
            {
                if(CollSelectedButton.ContainsKey(btnClicked.Text))
                {
                    string selectedDate1 = "/" + selectedDate;
                    string selectedDate2 =selectedDate + "/";
                    allselecteddates = allselecteddates.Replace(selectedDate1, "");
                    allselecteddates = allselecteddates.Replace(selectedDate2, "");
                    allselecteddates = allselecteddates.Replace(selectedDate, "");
                    btnClicked.SetBackgroundResource(Resource.Drawable.rounded_corners);
                    CollSelectedButton.Remove(btnClicked.Text);
                    SelectedDates.Text = allselecteddates;
                }
                else
                {
                    if(allselecteddates != "")
                    {
                        allselecteddates = allselecteddates + "/";
                    }
                    allselecteddates = allselecteddates + selectedDate;
                    btnClicked.SetBackgroundResource(Resource.Drawable.selected);
                    CollSelectedButton.Add(btnClicked.Text, btnClicked);
                    SelectedDates.Text = allselecteddates;
                }
            }
            ButtonCount = 0;
            return false;
        }
        public void StartTimer(TimeSpan interval, Func<bool> callback)
        {
            var handler = new Handler(Looper.MainLooper);
            handler.PostDelayed(() =>
            {
                if (callback())
                    StartTimer(interval, callback);

                handler.Dispose();
                handler = null;
            }, (long)interval.TotalMilliseconds);
        }
        public void SeConnecter(object sender, EventArgs e)
        {
            EditText oLogin = FindViewById<EditText>(Resource.Id.enterlogin);
            EditText oPassword = FindViewById<EditText>(Resource.Id.enterpassword);
            login = oLogin.Text;
            password = oPassword.Text;
            GetVisiteurs();
        }
        public void InitialisationCalendrier()
        {
            allselecteddates = "";
            int daysincurrentmonth = DateTime.DaysInMonth(Year, Month);
            int IntDayofWeek = oFunction.getIntDayofWeek(Year, Month);
            Button btn_Next = FindViewById<Button>(Resource.Id.btn_next);
            btn_Next.Click += NextMonth;
            Button Valider = FindViewById<Button>(Resource.Id.valider);
            Valider.Click += ValiderDemandeConges;
            Button afficheNbConges = FindViewById<Button>(Resource.Id.NbConges);
            afficheNbConges.Click += AfficherNbConges;
            Button btn_Previous = FindViewById<Button>(Resource.Id.btn_previous);
            btn_Previous.Click += PreviousMonth;
            Xamarin.Forms.SwipeGestureRecognizer leftSwipeGesture = new Xamarin.Forms.SwipeGestureRecognizer { Direction = Xamarin.Forms.SwipeDirection.Left | Xamarin.Forms.SwipeDirection.Down };
            leftSwipeGesture.Swiped += PreviousMonth;
            Mois = FindViewById<TextView>(Resource.Id.month);
            fullMonthName = new DateTime(2015, Month, 1).ToString("MMMM", CultureInfo.CreateSpecificCulture("fr"));
            Mois.Text = fullMonthName + " " + Year;
            Button btn;
            GetEtatJours();
            int DayPos = 0;
            for (int i = 1; i <= daysincurrentmonth; i++)
            {
                DayPos = i + IntDayofWeek - 1;
                switch (DayPos)
                {
                    case 1:
                        btn = FindViewById<Button>(Resource.Id.btn_1);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;

                    case 2:
                        btn = FindViewById<Button>(Resource.Id.btn_2);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 3:
                        btn = FindViewById<Button>(Resource.Id.btn_3);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 4:
                        btn = FindViewById<Button>(Resource.Id.btn_4);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 5:
                        btn = FindViewById<Button>(Resource.Id.btn_5);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 6:
                        btn = FindViewById<Button>(Resource.Id.btn_6);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 7:
                        btn = FindViewById<Button>(Resource.Id.btn_7);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 8:
                        btn = FindViewById<Button>(Resource.Id.btn_8);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 9:
                        btn = FindViewById<Button>(Resource.Id.btn_9);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 10:
                        btn = FindViewById<Button>(Resource.Id.btn_10);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 11:
                        btn = FindViewById<Button>(Resource.Id.btn_11);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 12:
                        btn = FindViewById<Button>(Resource.Id.btn_12);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 13:
                        btn = FindViewById<Button>(Resource.Id.btn_13);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 14:
                        btn = FindViewById<Button>(Resource.Id.btn_14);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 15:
                        btn = FindViewById<Button>(Resource.Id.btn_15);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 16:
                        btn = FindViewById<Button>(Resource.Id.btn_16);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 17:
                        btn = FindViewById<Button>(Resource.Id.btn_17);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 18:
                        btn = FindViewById<Button>(Resource.Id.btn_18);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 19:
                        btn = FindViewById<Button>(Resource.Id.btn_19);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 20:
                        btn = FindViewById<Button>(Resource.Id.btn_20);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 21:
                        btn = FindViewById<Button>(Resource.Id.btn_21);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 22:
                        btn = FindViewById<Button>(Resource.Id.btn_22);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 23:
                        btn = FindViewById<Button>(Resource.Id.btn_23);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 24:
                        btn = FindViewById<Button>(Resource.Id.btn_24);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 25:
                        btn = FindViewById<Button>(Resource.Id.btn_25);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 26:
                        btn = FindViewById<Button>(Resource.Id.btn_26);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 27:
                        btn = FindViewById<Button>(Resource.Id.btn_27);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 28:
                        btn = FindViewById<Button>(Resource.Id.btn_28);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 29:
                        btn = FindViewById<Button>(Resource.Id.btn_29);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 30:
                        btn = FindViewById<Button>(Resource.Id.btn_30);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 31:
                        btn = FindViewById<Button>(Resource.Id.btn_31);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 32:
                        btn = FindViewById<Button>(Resource.Id.btn_32);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 33:
                        btn = FindViewById<Button>(Resource.Id.btn_33);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 34:
                        btn = FindViewById<Button>(Resource.Id.btn_34);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 35:
                        btn = FindViewById<Button>(Resource.Id.btn_35);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 36:
                        btn = FindViewById<Button>(Resource.Id.btn_36);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;
                    case 37:
                        btn = FindViewById<Button>(Resource.Id.btn_37);
                        btn.SetBackgroundResource(Resource.Drawable.rounded_corners);
                        btn.Visibility = ViewStates.Visible;
                        CollButton.Add(DayPos, btn);
                        btn.Text = i.ToString();
                        btn.Click += this.Clicked;
                        break;

                }
            }
        }
        public async void ValiderDemandeConges(object sender, EventArgs e)
        {
            EditText EtatJour = FindViewById<EditText>(Resource.Id.chooseetat);
            TextView Error = FindViewById<TextView>(Resource.Id.error);
            string Etat = EtatJour.Text;
            if(Etat =="JTR" || Etat == "CP")
            {
                Error.Visibility = ViewStates.Gone;
                EtatJour DayToUpdate = new EtatJour();
                TextView SelectedDates = FindViewById<TextView>(Resource.Id.insertdates);
                string[] AllSelectedDates = allselecteddates.Split("/");
                foreach (string date in AllSelectedDates)
                {
                    DayToUpdate.etatjour = Etat;
                    DayToUpdate.idVisiteur = ConnectedVisitor.id;
                    DayToUpdate.jour = date;
                    var json = JsonConvert.SerializeObject(DayToUpdate);
                    HttpClient client = new HttpClient();
                    HttpContent httpcontent = new StringContent(json);
                    httpcontent.Headers.ContentType = new System.Net.Http.Headers.MediaTypeHeaderValue("application/json");
                    string URL = "http://projetbenjaminteyssier.c1.biz/api/Method/UpdateEtatJour.php";
                    await client.PutAsync(URL, httpcontent);
                }
                SelectedDates.Text = "";
                foreach (var button in CollButton)
                {
                    button.Value.Visibility = ViewStates.Gone;
                }
                CollButton.Clear();
                ButtonCount = 0;
                InitialisationCalendrier();
            }
            else
            {
                Error.Visibility = ViewStates.Visible;
                EtatJour.Text = "";
            }
            
        }
        public void AfficherNbConges(object sender, EventArgs e)
        {
            this.GetNbJourConges();
        }
        public void Retour(object sender, EventArgs e)
        {
            this.CollButton.Clear();
            this.SetContentView(2130968602);
            this.InitialisationCalendrier();
        }
    }


}

