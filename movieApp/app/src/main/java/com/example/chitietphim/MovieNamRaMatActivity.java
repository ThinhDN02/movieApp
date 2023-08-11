package com.example.chitietphim;

import android.content.Intent;
import android.os.Bundle;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.Volley;
import com.example.chitietphim.Adapter.MovieAdapter;
import com.example.chitietphim.Model.MovieItem;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;


public class MovieNamRaMatActivity extends AppCompatActivity {

    private RecyclerView recyclerViewYear;
    private MovieAdapter movieAdapterYear;
    private List<MovieItem> movieItemsYear;
    private TextView tv_nam;

    String urlGetDataTL = "http://172.17.21.45:8080/service/datamovieyear.php";

    String idtl="";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_namsx);
        setTitle("Tìm theo năm");
        recyclerViewYear = findViewById(R.id.rcv_list_movie_nam);
        tv_nam = findViewById(R.id.tv_nam);
        LinearLayoutManager linearLayoutManager = new LinearLayoutManager(this, RecyclerView.VERTICAL, false);
        recyclerViewYear.setLayoutManager(linearLayoutManager);

        movieItemsYear =new ArrayList<>();


        Intent intent = getIntent();
        if (intent != null) {
            String idmovie = intent.getStringExtra("year");
            idtl = idmovie;
            switch (idmovie) {
                case "1990":
                    tv_nam.setText("Phim ra mắt trước năm 2000");
                    break;
                case "2001":
                    tv_nam.setText("Phim ra mắt từ năm 2000 đến 2009");
                    break;
                case "2011":
                    tv_nam.setText("Phim ra mắt từ năm 2010 đến 2019");
                    break;
                default:
                    tv_nam.setText("Phim ra mắt từ năm 2020 đến nay");
                    break;
            }
            GetData(urlGetDataTL,idtl);
        }
    }
    private void GetData(String url,String nam){
        url+="?namRaMat="+nam;
        RequestQueue requestQueue = Volley.newRequestQueue(this);
        JsonArrayRequest jsonArrayRequest = new JsonArrayRequest(Request.Method.GET, url, null, new Response.Listener<JSONArray>() {
            @Override
            public void onResponse(JSONArray response) {
                for (int i = 0; i < response.length(); i++) {
                    try {
                        JSONObject object = response.getJSONObject(i);
                        movieItemsYear.add(new MovieItem(
                                object.getString("maPhim"),
                                object.getString("tenPhim"),
                                object.getString("soDiemPhim"),
                                object.getString("anhBia")
                        ));
                    } catch (JSONException e) {
                        e.printStackTrace();
                    }
                    movieAdapterYear = new MovieAdapter(MovieNamRaMatActivity.this, movieItemsYear);
                    recyclerViewYear.setAdapter(movieAdapterYear);
                }

            }
        },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(MovieNamRaMatActivity.this, "Lỗi!" + error.toString(), Toast.LENGTH_LONG).show();
                    }
                }
        );
        requestQueue.add(jsonArrayRequest);
    }
}